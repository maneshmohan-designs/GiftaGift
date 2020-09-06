
<meta charset="utf-8">
<html>
    <head>
       
        <link rel="stylesheet" href="css/products.css">
        <link rel="stylesheet" href="waves.css">
       
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-2.1.1.js"></script>
    </head>
    <body>
        <nav>
            <?php include_once('index.php'); ?>
        </nav>
        <?php
        $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
        $tbl_name="orders";
            $db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
            
            $username=$_SESSION['id'];
        $sql="SELECT * FROM $tbl_name WHERE userid='$username' and prodtype='gift'";
        $res=mysqli_query($db,$sql);
?>
        <ul class="gifts">
        <?php
      while($rows=mysqli_fetch_array($res))
    {
        
        $gid=$rows['cartid'];
        
        $sql1="select * from products where gid='$gid'";
        $res1=mysqli_query($db,$sql1);
        
        while($row=mysqli_fetch_array($res1))
        {
           
            
    ?>
        <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row['gimage']; ?>">
        <span class="gid"><?php echo $rows['orderid']; ?></span>
        <?php if($rows['deliverystat']==0) 
        echo 'in transit<br>';
        else echo 'product delivered';?>
        <span id="prod-name"> <?php echo $row['gname']; ?></span>
        <span>RS.<?php echo $row['price']; ?></span>
            </a>
        </li>
       
    <?php
            }
    
      }
             $sql2="SELECT * FROM orders WHERE userid='$username' and prodtype='card'";
        $res2=mysqli_query($db,$sql2);
            while($row2=mysqli_fetch_array($res2))
            {
        $gid2=$row2['cartid'];
        
        $sql3="select * from cards where cardid='$gid2'";
        
        $res3=mysqli_query($db,$sql3);
          if($res3)
             
         $row3=mysqli_fetch_array($res3); 
                
    
    ?>
         <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row3['image']; ?>">
        <span class="gid"><?php echo $row2['cartid']; ?></span>
       <?php if($row2['deliverystat']==0) 
        echo 'in transit<br>';
        else echo 'product delivered';?>
        <!--<span id="prod-name"> <?php echo $row3['gname']; ?></span> 
        <span>RS.50</span>
            --></a>
        </li>
    <?php
            }
        
        ?>
        </ul>
    </body>
</html>
