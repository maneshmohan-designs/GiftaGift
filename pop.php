<?php
$host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="cards"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$sql="select * from $tbl_name where cardid='$'";
$res=mysqli_query($db,$sql);
if($res)
    echo "sucess";
?>