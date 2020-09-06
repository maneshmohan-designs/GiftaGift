
<html>
    <head> <script src="js/fabric.min.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/edit.css">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="index.css">
    </head>
<nav>
    <?php
include_once('index.php');
?>
    </nav>
    
    <div id="upload">
	<form id="uploadImg" runat="server">
  <input type="file" class="button" value="" id="uploadedImg" >
        </form></div>
        <button  id="text-btn" class="button">Text</button>
  <!--  <button id="crop" class="button ">CROP</button>
    <button id="italic">Italic</button>
        <button id="underline">Underline</button></div>
--><canvas id="canvas"></canvas>
        <input type="button" id="save-btn" class="button" value="save">
<form method="post" action="save.php" id="formjson" >
    <input type="text" id="stringjson" name="stringjson" value="">
    <input id="imagejpeg" value="" name="imagejpeg">
    <input id="editorsave" value="" name="editorsave" type="number">
    </form>
    <?php
if(isset($_GET['gid']))
        $cardid=$_GET['gid'];
   else
       $cardid=0;
   
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="giftagift";  
$tbl_name="cards"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$sql="select * from $tbl_name where cardid='$cardid'";
    $res=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($res);
    $string=$row['jsonstring'];

        
    ?><script type="text/javascript">

        var canvas = new fabric.Canvas('canvas');
canvas.setHeight(480);
canvas.setWidth(640);
    var mystring = <?php echo json_encode($string); ?>;        //alert(mystring);
      var cardid=<?php echo($cardid); ?>
     //   alert('hi');
        //document.write(string);
    if(cardid!=0)
    {
          var json1=JSON.parse(mystring);
        
        canvas.loadFromJSON(json1, function() {

 var dataurl=canvas.toDataURL("image/jpeg");
  canvas.renderAll();

 
  console.log(canvas.item(0).name);
        });
   document.getElementById('editorsave').value=cardid;
    }
    else{
        var ele=document.getElementById('formjson');
        var ele1=document.getElementById('editorsave');
        ele.removeChild(ele1);
    }
    document.getElementById('save-btn').onclick=function()
    {
        
var json = canvas.toJSON();
        var data=JSON.stringify(json);
        
        var dataurl=canvas.toDataURL("image/jpeg");
        document.getElementById('imagejpeg').value= dataurl;
        document.getElementById('stringjson').value= data;
        document.getElementById('formjson').submit();
canvas.clear();
         json=JSON.parse(data);
        canvas.loadFromJSON(json, function() {
var dataurl=canvas.toDataURL("image/jpeg");
  // making sure to render canvas at the end
  canvas.renderAll();

  // and checking if object's "name" is preserved
  console.log(canvas.item(0).name);
});
       //alert(data);
    };
    //var canvas = new fabric.Canvas('canvas');
//canvas.setHeight(480);
//canvas.setWidth(640);
document.getElementById('uploadImg').onchange = function handleImage(e) {
var reader = new FileReader();
  reader.onload = function (event){
    var imgObj = new Image();
    imgObj.src = event.target.result;
    imgObj.onload = function () {
      var image = new fabric.Image(imgObj);
      image.set({
            angle: 0,
            padding: 10,
            cornersize:10,
            height:110,
            width:110,
      });
      
      canvas.centerObject(image);
      canvas.add(image);
      canvas.renderAll();
    }
  }
  reader.readAsDataURL(e.target.files[0]);
}
  document.getElementById('text-btn').onclick=function(){canvas.add(new fabric.IText('Tap and Type', { 
  fontFamily: 'arial black',
  left: 0, 
  top: 0 ,fontSize:20,
            fill:'#000'
}))};
    
document.getElementById('crop').onclick=function() {
    
    image.selectable = true;
    disabled = true;
    rectangle.visible = false;
    var cropped = new Image();
    cropped.src = canvas.toDataURL({
        left: rectangle.left,
        top: rectangle.top,
        width: rectangle.width,
        height: rectangle.height
    });
    cropped.onload = function() {
        canvas.clear();
        image = new fabric.Image(cropped);
        image.left = rectangle.left;
        image.top = rectangle.top;
        image.setCoords();
        canvas.add(image);
        canvas.renderAll();
    };
};
    
   function setStyle(object, styleName, value) {
  if (object.setSelectionStyles && object.isEditing) {
    var style = { };
    style[styleName] = value;
    object.setSelectionStyles(style);
  }
  else {
    object[styleName] = value;
  }
}
function getStyle(object, styleName) {
  return (object.getSelectionStyles && object.isEditing)
    ? object.getSelectionStyles()[styleName]
    : object[styleName];
}

function addHandler(id, fn, eventName) {
  document.getElementById(id)[eventName || 'onclick'] = function() {
    var el = this;
    canvases.forEach(function(canvas, obj) {
      if (obj = canvas.getActiveObject()) {
        fn.call(el, obj);
        canvas.renderAll();
      }
    });
  };
}


addHandler('bold', function(obj) {
  var isBold = getStyle(obj, 'fontWeight') === 'bold';
  setStyle(obj, 'fontWeight', isBold ? '' : 'bold');
});

addHandler('italic', function() {
  var isItalic = getStyle(obj, 'fontStyle') === 'italic';
  setStyle(obj, 'fontStyle', isItalic ? '' : 'italic');
});

addHandler('underline', function(obj) {
    alert('underline');
  var isUnderline = (getStyle(obj, 'textDecoration') || '').indexOf('underline') > -1;
  setStyle(obj, 'textDecoration', isUnderline ? '' : 'underline');
});

addHandler('line-through', function(obj) {
  var isLinethrough = (getStyle(obj, 'textDecoration') || '').indexOf('line-through') > -1;
  setStyle(obj, 'textDecoration', isLinethrough ? '' : 'line-through');
});

addHandler('color', function(obj) {
  setStyle(obj, 'fill', this.value);
}, 'onchange');

addHandler('bg-color', function(obj) {
  setStyle(obj, 'textBackgroundColor', this.value);
}, 'onchange');

addHandler('size', function(obj) {
  setStyle(obj, 'fontSize', parseInt(this.value, 10));
}, 'onchange');

  
    </script>
</html>