<html>
    <head>
    </head>
  <div id="image"></div>
<?php
//require 'vendor/autoload.php';
    require 'classPhpPsdReader.php';

// Send header to client browser
//header("Content-type: image/jpeg");
// Includes the requested class
$im = @imagecreatefrompsd('test.psd');
if (!$im)
{
echo 'Invalid image supplied';
}
else
{
    imagepng($im, 'out.png');
}
imagedestroy($im);

//header( "Content-type: image/jpeg" );

//$imagine = new Imagine\Gd\Imagine();
    //$image = $imagine->open('image.psd');
     //echo "<img src='data:image/jpeg;base64," . base64_encode( $image ) . "' />";
    //echo "Image contains " . count($image->layers()) . " layers";
   
    //$image=imagejpeg(imagecreatefrompsd('test.psd'));
  // echo "<img src='data:image/jpeg;base64," . base64_encode( $image ) . "' />";
    
    ?>
    

</html>