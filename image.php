
<?php 
header('Content-type: image/jpeg');
$im = new Imagick("image.psd");
$image->thumbnailImage(100, 0);
echo $image;
foreach($im as $layer) {
  // do something with each $layer
  // example: save all layers to separate PNG files
  $layer->writeImage("layer" . ++$i . ".png");
}
?>
