<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
<nav><?php

include_once('index.php');
?>
</nav>
<div id="checkout">
<div id="head1">Enter the delivery address</div>
<form method="post" action="checkedout.php">
Recievers name:<input type="text" name="recname" required>
    Recievers address:<input type="text" name="field1" required>
    <input type="text" name="field2" required>
    Pincode:<input type="number" name="pinc" value="<?php echo $_SESSION['pincode']; ?>">
    <input type="submit" name="submit" value="PAY" class="button button-block">
</form>
        </div>
    </body>
    
         <script type="text/javascript">
        
        
        $('#form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
        </script>
        
</html>
<style type="text/css">
    #head1
    {
        margin-bottom: 
            20px;
        opacity:.8;
    }
    nav
    {
     
    }
    #checkout
    {
        position:absolute;
        display:block;
        margin-top: 
            10%;
        font-family: 
            'sans-serif';
        margin-left: 
            30%;
        
    }
 /*   #checkout input[type=text],input[type=number]
    {
        width:250px;
        background-color: 
            white;
        box-shadow: 
            none;
        border-color: 
            none;
        border-radius: 
            3px;
        height:10px;
    }*/
</style>
<?php

?>