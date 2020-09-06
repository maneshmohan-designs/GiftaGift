<!doctype html>
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="css/products.css">
    <script src="jquery-2.1.1.js"></script>
    </head>
<body>
    <nav>
        <?php  include_once('index.php'); ?>
    </nav>
    <div id="product">
    <?php
        
        $gid=$_GET['gid'];
     
        $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="products"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
        $sql="select * from $tbl_name where gid='$gid'";
        $res=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($res);?>
    
    
    <ul>
    <li class="box" id="bx1">
    <a href="#">
        <img src="<?php echo $row['gimage']; ?>">
        <h4> <?php echo $row['gname']; ?></h4>
        <span id="price">RS.<?php echo $row['price']; ?></span>
        <span class="gid" id="gid"><?php echo $row['gid']; ?></span>
        <div id="cart" class="cart"  >Add to CART</div>
    <div id="desc"><?php echo $row['description']; ?></div>
             
            </a>
        </li>
         <script type="text/javascript">
           
 $('.cart').on('click',function(){
  var ab=$(this).siblings('span.gid').html();  
     
window.location.href="addtocart.php?gid="+ab;
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
    }
    #cart
    {
        border-radius: 
            0;  
        width:50px;
        background-color: 
            #3FA2B7;
        color:white;
    }
</style>