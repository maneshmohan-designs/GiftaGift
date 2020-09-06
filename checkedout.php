<html>
    
    
<?php

session_start();
$userid=$_SESSION['id'];
$recname=$_POST['recname'];
$field1=$_POST['field1'];
$field2=$_POST['field2'];
    $pinc=$_POST['pinc'];
$pin1=$_POST['pinc'];
$pin=substr($pin1,0,3);
   $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="orders"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,'giftagift');
$sql2="select * from printusers where printloc=$pin";
echo $sql2;
$res2=mysqli_query($db,$sql2);
if($res2)
    echo 'success';
$row2=mysqli_fetch_array($res2);
$printid=$row2['printid'];
echo $printid;
$sql1="select * from cart where userid='$userid'";
$res1=mysqli_query($db,$sql1);
if($res1)
    echo 'success2';
while($row1=mysqli_fetch_array($res1))
{
$cartid=$row1['gid'];
$sql="insert into $tbl_name(prodtype,printid,recname,recaddress1,recaddress2,pincode,cartid,userid) values('gift','$printid','$recname','$field1','$field2','$pinc','$cartid','$userid')";
echo $sql;
$res=mysqli_query($db,$sql);
}if($res)
    echo 'success1';
$sql3="select * from cardcart where userid='$userid'";
$res3=mysqli_query($db,$sql3);
while($row3=mysqli_fetch_array($res3))
{
$ccartid=$row3['cardid'];
$sql4="insert into $tbl_name(prodtype,printid,recname,recaddress1,recaddress2,pincode,cartid,userid) values('card','$printid','$recname','$field1','$field2','$pinc','$ccartid','$userid')";
$res4=mysqli_query($db,$sql4);
}
if($res4)
    echo 'success3';
$sql5="delete from cart where userid='$userid'";
$sql6="delete from cardcart where userid='$userid'";
$res5=mysqli_query($db,$sql5);
$res6=mysqli_query($db,$sql6);
header('location:products.php');
?>
</html>