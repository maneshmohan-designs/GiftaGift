<!doctype html>
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="index.css">
    
    <script src="jquery-2.1.1.js"></script>
    </head>
<body>
   <nav>
            <div id="top"><ul><li id="home-btn">home</li></ul><?php 
             session_start();
             if(!isset($_SESSION['pusername']))
             {
                 echo '<a href="#" id="login-btn">';
                 echo 'LOGIN|SIGNUP' ;
             }
                 else 
                 {
                     echo '<a id="dropdown">';
                 echo 'welcome  '.$_SESSION['printname'];
                 }?>
            
                <script type="text/javascript">
                document.getElementById('home-btn').onclick=function(){
                    window.location.href="printuser.php";
                };
                     document.getElementById('gift-btn').onclick=function(){
                    window.location.href="addprintuser.php";
                };
                </script>
    </a><div id="dropdown-content"><a href="logout.php">logout</a></div></div>
    <div id="head"> <a href="#">GIFT<span id="aa">A</span>GIFT</a><img id="logo" src="images/logo2.png">
        <script type="text/javascript">
        document.getElementById('dropdown').onclick=function(){
            
document.getElementById('dropdown-content').style.display='block';
        };
        </script>
  <div class="container-1">
     
  </div>
        
        </div>
        <!--   <div id="home-image"></div>-->
     
        </nav>
     
    <div id="product">
    <?php
        
        $gid=$_GET['gid'];
     
        $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="orders"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
        $sql="select * from $tbl_name where orderid='$gid'";
        $res=mysqli_query($db,$sql);
        $rows=mysqli_fetch_array($res);
         $pid=$rows['cartid'];
        
        if($rows['prodtype']=='gift')
        {
        $sql1="select * from products where gid='$pid'";
        $res1=mysqli_query($db,$sql1);
            $row=mysqli_fetch_array($res1);
        
    ?>
    <ul class="">
    <li class="box" id="bx1">
    <a href="#">
        <img src="<?php echo $row['gimage']; ?>">
        <span>
        <?php echo $rows['recname'];
            ?>
        </span>
        <span><?php echo $rows['recaddress1']; echo','; echo $rows['recaddress2']; echo '</br>'; echo $rows['pincode']; ?></span>
        <span class="gid" id="gid"><?php echo $rows['orderid']; ?></span>
        <div id="cart" class="cart"  >delivered</div>
    
             <h4> <?php echo $row['gname']; ?></h4>
            </a>
        </li>
        </ul>
        <?php
        }
        
         else
        {
             $sql1="select * from cards where cardid='$pid'";
        $res1=mysqli_query($db,$sql1);
            $row=mysqli_fetch_array($res1);
            echo'card';
            ?>
             <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row['image']; ?>">
         <span>
        <?php echo $rows['recname'];
             echo ',';
            ?>
       </span> 
         <span><?php echo $rows['recaddress1']; echo','; $rows['recaddress2']; echo '</br>'; echo $rows['pincode']; ?></span>
        
        <span class="gid"><?php echo $rows['orderid']; ?></span>
       <!--<img id="cart" class="cart" src="images/cart-add-icon.png" width="40px">
        <span id="prod-name"> <?php echo $row['gname']; ?></span>
        <span><?php echo $row['price']; ?></span>
            --></a>
        </li>
            
            
    <?php    }?>
         <script type="text/javascript">
             
           
 $('.cart').on('click',function(){
  var ab=$(this).siblings('span.gid').html();  
     
 window.location.href="delivered.php?gid="+ab;
});
    </script>
        </ul>
    </div>
    </body>
</html>
<style>
.box
    {
        display: block;
        position: 
absolute;
top: 
    20%;
        width:100%;
        height:70%;
    }
    #cart
    {
        border-radius: 
            0;  
        width:50px;
        background-color: 
            #3FA2B7;
        margin-top: 
            5px;
        color:white;
    }
</style>