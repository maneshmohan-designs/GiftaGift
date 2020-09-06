<?php
$pin1=$_POST['pincode'];
$pin=substr($pin1,0,3);

$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="giftagift";  
$tbl_name="printusers"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$sql="select * from $tbl_name where printloc='$pin'";
    $res=mysqli_query($db,$sql);
$num=mysqli_num_rows($res);
    session_start();
if($num)
{
    $_SESSION['pinavail']=1;
    $_SESSION['pincode']=$pin1;
}
else
    $_SESSION['pinavail']=0;
header('location:cart.php');
?>