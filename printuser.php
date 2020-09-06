<?php
session_start();
if(isset($_SESSION['pusername']))
if($_SESSION['pusername']==0)
    header('location:create.php');
?>
<meta charset="utf-8">
<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="css/products.css">
        <link rel="stylesheet" href="waves.css">
        <link rel="stylesheet" href="login.css">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-2.1.1.js"></script>
    </head>
    <body>
        <nav>
            <div id="top"><?php 
            
             if(!isset($_SESSION['pusername']))
             {
                 echo '<a href="#" id="login-btn">';
                 echo 'LOGIN|SIGNUP' ;
             }
                 else 
                 {
                     echo '<a id="dropdown">';
                 echo 'welcome  '.$_SESSION['printname'];
                 }?>
            
    </a><div id="dropdown-content"><a href="logout.php">logout</a></div></div>
    <div id="head"> <a href="#">GIFT<span id="aa">A</span>GIFT</a><img id="logo" src="images/logo2.png">
        <script type="text/javascript">
        document.getElementById('dropdown').onclick=function(){
            
document.getElementById('dropdown-content').style.display='block';
        };
        </script>
  <div class="container-1">
     
  </div>
        
        </div>
        <!--   <div id="home-image"></div>-->
     
        </nav>
     
      <div class="form" id="form">
      
      <ul class="tab-group">
        
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="#" method="post">
          
            <div class="field-wrap">
            <label>
              User ID<span class="req">*</span>
            </label>
            <input type="number" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <input type="submit" name="submit2" class="button button-block" value="Log In">
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div>
      <!--  <div id="part2"> 
        <div id=""></div>
        </div>
        -->
        <script type="text/javascript">
            
        document.getElementById('login-btn').onclick=function(){
            
            document.getElementById('form').style.display='block';
        };
          
            </script>
            <?php
//error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit2']))
{
$host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="printusers"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$myusername=$_POST['email']; 
$mypassword=$_POST['password']; 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($db,$myusername);
$mypassword = mysqli_real_escape_string($db,$mypassword);
$sql="SELECT * FROM $tbl_name WHERE printid='$myusername' and password='$mypassword'";
    
$res=mysqli_query($db,$sql);
$count=mysqli_num_rows($res);
$rows=mysqli_fetch_array($res);

    if($count==1){
      
session_start();
$_SESSION['pusername']=$myusername;
        $_SESSION['printname']=$rows['printname'];
$_SESSION['ppassword']=$mypassword;
$_SESSION['pid']=$rows['userid'];


        header('location:printuser.php');
//if($rows['type']==1)
//header("location:adminprofile.php");
//else
//header("location:volunteerprofile.php");
}
    else
        echo 'unsuccesful';

}
?>
        <?php
        
        
        $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="printusers"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
        
        $table='orders';
    mysqli_select_db($db,'giftagift');
    $userid=$_SESSION['pusername'];
   
    $sql="select * from $table where printid='$userid' and prodtype='gift'";
        
$res=mysqli_query($db,$sql);
        
                   $total=0;
    ?>
    
        <ul class="gifts">
        <?php
        
    while($rows=mysqli_fetch_array($res))
    {
        
        $gid=$rows['cartid'];
        $sql1="select * from products where gid='$gid'";
        $res1=mysqli_query($db,$sql1);
        while($row=mysqli_fetch_array($res1))
        {
            if($rows['deliverystat']==0)
            {
    ?>
        <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row['gimage']; ?>">
        <span class="gid"><?php echo $rows['orderid']; ?></span>
        <?php if($rows['deliverystat']==0) 
        echo '<img id="cart" class="cart" src="images/delete-btn.png" width="40px">';?>
        <span id="prod-name"> <?php echo $row['gname']; ?></span>
        <span>RS.<?php echo $row['price']; ?></span>
            </a>
        </li>
       
    <?php
            }
    }
    }
            ?>
        </ul>     
            <?php
         $table='orders';
    mysqli_select_db($db,'giftagift');
    
    $sql2="select * from $table where printid='$userid' and prodtype='card'";
            $res2=mysqli_query($db,$sql2);
            
    ?>
    
        <ul class="gifts">
            <span id="card-head">CARDS</span>
        <?php
            
    while($rows1=mysqli_fetch_array($res2))
    {
        $gid=$rows1['cartid'];
        $sql3="select * from cards where cardid='$gid'";
        $res3=mysqli_query($db,$sql3);
        if($rows1['deliverystat']==0)
        {
        while($row2=mysqli_fetch_array($res3))
        {
    ?>
        <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row2['image']; ?>">
        <span class="gid"><?php echo $rows1['orderid']; ?></span>
    <?php if($rows1['deliverystat']==0) 
        echo '<img id="cart" class="cart" src="images/delete-btn.png" width="40px">';?>
        <!--<span id="prod-name"> <?php echo $row['gname']; ?></span>-->
        <span>RS.50</span>
            </a>
        </li>
        
    <?php
            $total=$total+50;
    }
    }
    }
   
        
        
        ?>
        </ul>
     <script>
         $('.cart').on('click',function(event){
          event.stopPropagation();
              var ab=$(this).siblings('span.gid').html(); 
             
             window.location.href="delivered.php?gid="+ab;
             
      });
         
         $('.box').on('click',function(){
          var a=$(this).children('a').children('span.gid').html();
      $('.cart').on('click',function(){
          Event.stopPropagation();
      });
          window.location.href="printdetails.php?gid="+a;
      });
        </script>   <script type="text/javascript">
        
        
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
    </body>
</html>
