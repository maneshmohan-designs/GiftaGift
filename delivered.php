<?php

$gid=$_GET['gid'];
session_start();
$userid=$_SESSION['id'];
   $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="orders"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$sql="update $tbl_name set deliverystat=1 where orderid='$gid' ";
$res=mysqli_query($db,$sql);
if($res)
header("location:printuser.php");
else
    echo'unsuccessful';
?>