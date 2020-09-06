<?php

$gid=$_GET['gid'];
session_start();
$userid=$_SESSION['id'];
   $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="cardcart"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$sql="delete from $tbl_name where userid='$userid' and ccartid='$gid'";
echo $sql;
$res=mysqli_query($db,$sql);
if($res)
    
header("location:cart.php");
else
    echo'unsuccessful';
?>