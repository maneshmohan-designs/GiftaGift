<?php
error_reporting(!E_ALL);

//session_start();
//if(empty($_SESSION['id'])) 
{
  // header('Location:home.php');
}

?>
<!doctype html>
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="css/products.css">
          <script src="jquery-2.1.1.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
        <link href="waves.css" rel="stylesheet">
    
    </head>
    <body>
    <nav>
        <?php
    include_once('index.php');
        ?>
    </nav>
   
    <?php
    
    $userid=$_SESSION['id'];
    $db=mysqli_connect('localhost','root','','giftagift')OR DIE('cannot connect');
    $table='cart';
    mysqli_select_db($db,'giftagift');
    
    $sql="select * from $table where userid='$userid'";
$res=mysqli_query($db,$sql);
        $total=0;
    ?>
    
        <ul class="gifts">
        <?php
            $count=0;
    while($rows=mysqli_fetch_array($res))
    {
        $count++;
        $gid=$rows['gid'];
        $sql1="select * from products where gid='$gid'";
        $res1=mysqli_query($db,$sql1);
        while($row=mysqli_fetch_array($res1))
        {
    ?>
        <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row['gimage']; ?>">
        <span class="gid"><?php echo $rows['cartid']; ?></span>
       <img id="cart" class="cart" src="images/delete-btn.png" width="40px">
        <span id="prod-name"> <?php echo $row['gname']; ?></span>
        <span>RS.<?php echo $row['price']; ?></span>
            </a>
        </li>
       
    <?php
            $total=$total+$row['price'];
    }
    }
            ?>
        </ul>     
            <?php
         $table='cardcart';
    mysqli_select_db($db,'giftagift');
    
    $sql2="select * from $table where userid='$userid'";
            $res2=mysqli_query($db,$sql2);
            
    ?>
    
        <ul class="gifts">
            <?php 
    
    while($rows1=mysqli_fetch_array($res2))
    {
        $count++;
        $gid=$rows1['cardid'];
       
        $sql3="select * from cards where cardid='$gid'";
        
        $res3=mysqli_query($db,$sql3);
        
        while($row2=mysqli_fetch_array($res3))
        {
    ?>
        <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row2['image']; ?>">
        <span class="gid"><?php echo $rows1['ccartid']; ?></span>
    <img id="cartd" class="cartd" src="images/delete-btn.png" width="40px"><!--<span id="prod-name"> <?php echo $row['gname']; ?></span>-->
        <span>RS.50</span>
            </a>
        </li>
      
    <?php
            $total=$total+50;
    }
    }
            $er=1;
            if($count==0)
            {
                echo 'There are no items in the cart';
                $er=0;
            }
            else
            {
   
            if($_SESSION['pinavail']==1)
            {
                
     ?>       <form method="post" action="checkpincode.php">
            PINCODE<input type="number" name="pincode" id="pincode" maxlength="6" value="<?php echo $_SESSION['pincode']; ?>">
                <input type="submit" name="submit" value="check" class="button button-block" >
            </form>
<?php echo 'available'; 
            }            else
            {?>
                <form method="post" action="checkpincode.php">
            PINCODE<input type="number" name="pincode" id="pincode" maxlength="6" value="">
                <input type="submit" name="submit" value="check"  class="button button-block">
            </form>
            <?php echo 'invalid pincode';
            $er=0;}
            }?>              <span id="cart-total">Amount Payable:RS. 
                <?php echo $total; 
            if($er!=0)
                echo'<div id="ckout-btn">Checkout</div>';?>
           </span>
        </ul>
          
        
        
       
   
               <script type="text/javascript">
                   $('#ckout-btn').on('click',function(){
                       window.location.href="checkout.php";
                   });
                
      $('.box').on('click',function(){
          var a=$(this).children('a').children('span.gid').html();
 
          window.location.href="details.php?gid="+a;
      });
                           $('.cart').on('click',function(event){
          event.stopPropagation();
              var ab=$(this).siblings('span.gid').html(); 
             
             window.location.href="delete-cart.php?gid="+ab;
             
      });
                   
                    $('.cartd').on('click',function(event){
          event.stopPropagation();
              var ab=$(this).siblings('span.gid').html(); 
             
             window.location.href="delete-card-cart.php?gid="+ab;
             
      });
        </script>                   
    </body>
</html>