<!doctype html>
<meta charset="utf-8">
<html>
    <head>
    <link rel="stylesheet" href="css/products.css">
        
        <link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="waves.css" rel="stylesheet">
        <script src="jquery-2.1.1.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    </head>
<body>
        
    <nav>
        <?php
    include_once('index.php');
        ?>
    </nav>
    <div id="products">
    <?php
    $user=$_SESSION['id'];
$db=mysqli_connect('localhost','root','','giftagift')OR DIE('cannot connect');
    $table='cards';
    mysqli_select_db($db,'giftagift');
    
    $sql="select * from $table where userid='$user'";
$res=mysqli_query($db,$sql);
    $count=mysqli_num_rows($res);
    ?>
    <ul class="gifts">
        <?php
    while($row=mysqli_fetch_array($res))
    {
    ?>
        <li class="box waves-effect" id="bx1" style="margin-top:45px;">
    <a href="#">
        <img src="<?php echo $row['image']; ?>">
        <span class="gid"><?php echo $row['cardid']; ?></span>
       <img id="cart" class="cart" src="images/cart-add-icon.png" width="40px">
        <!--<span id="prod-name"> <?php echo $row['gname']; ?></span>
        <span><?php echo $row['price']; ?></span>
            --></a>
        </li>
    <?php
    }
        ?>
     
    <script type="text/javascript">
         $('.cart').on('click',function(event){
          event.stopPropagation();
              var ab=$(this).siblings('span.gid').html(); 
             
             window.location.href="addtocardcart.php?gid="+ab;
             
      });
      $('.box').on('click',function(){
          var a=$(this).children('a').children('span.gid').html();
      $('.cart').on('click',function(){
          Event.stopPropagation();
      });
          window.location.href="edit2.php?gid="+a;
      });

    </script>   
        
    </ul>
    </div>

    </body>
    <script type="text/javascript">
      

    </script>
</html>