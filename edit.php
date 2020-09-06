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

<form enctype="multipart/form-data" method="post" action="editsave.php">
    <label for="gname">Gift name</label><input type="text" name="gname" value="<?php echo $row['gname']; ?>">
    <input type="number" name="gid" value="<?php echo $gid; ?>">
  <input type="file" size="32" name="image_field" value="<?php echo $row['gimage']; ?>">
     price<input type="number" name="price" value="<?php echo $row['price']; ?>" >
        description<input type="text" name="desc" value="<?php echo $row['description']; ?>">
  <input type="submit" name="Submit" value="upload">

        </form>



    