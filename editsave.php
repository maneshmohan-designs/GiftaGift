<?php
include('src/class.upload.php');
error_reporting(E_ALL);


$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : 'images/products');
$dir_pics = (isset($_GET['pics']) ? $_GET['pics'] : $dir_dest);

    // ---------- IMAGE UPLOAD ----------

    // we create an instance of the class, giving as argument the PHP object
    // corresponding to the file field from the form
    // All the uploads are accessible from the PHP object $_FILES
    $handle = new Upload($_FILES['image_field']);

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.$foo->image_resize          = true;
         $handle->image_resize            = true;
$foo->image_ratio_crop      = true;
$foo->image_y               = 150;
$foo->image_x               = 150;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' -  ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }

        

        $db=mysqli_connect('localhost','root','','giftagift');
        $gname=$_POST['gname'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $gid=$_POST['gid'];
        $gimage=$dir_pics.'/' .$handle->file_dst_name ;
        $sql="update products set gname='$gname',gimage='$gimage',price='$price',description='$desc' where gid='$gid'";
        mysqli_query($db,$sql);
        
        // we delete the temporary files
        $handle-> Clean();

 
    }
       $db=mysqli_connect('localhost','root','','giftagift');
        $gname=$_POST['gname'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $gid=$_POST['gid'];
       echo' hi';
        $sql="update products set gname='$gname',price='$price',description='$desc' where gid='$gid'";
echo $sql;
       $res=mysqli_query($db,$sql);
header("location:create.php");
?>