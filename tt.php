<form method="post" action="tt.php">
    <input type="text" name="name1">
    <input type="text" name="name2">
    <input type="password" name="pass">
    <input type="submit" name="submit" value="submit">
</form> 
<?php
if(isset($_POST['submit']))
{
$dbname="test";
    $tblname="test1";
$name1=$_POST['name1'];
$name2=$_POST['name2'];
$pass=$_POST['pass'];
$db=mysqli_connect('localhost','root','','$dbname') or die('cannot connect');
$sql="insert into $tblname values('$name1','$name2','$pass')";
    $res=mysqli_query($db,$sql);
    if($res)
    {
        echo'success';
    }
    else
        echo 'unsuccessful';
    
}
?>