<?php
session_start();
?>
<meta charset="utf-8">
<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="login.css">          <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="jquery-2.1.1.js"></script>
       
    </head>
    <body>
            <div id="top"><ul><li id="home-btn">home</li><li id="gift-btn">gifts</li><li id="card-btn">cards</li><li id="editor-btn">editor</li><li id="orders-btn">orders</li></ul>
                <?php 
                //echo $_SESSION['id'].":: SEssion";
                if(isset($_SESSION['id']))
{
                echo'<script type="text/javascript">
                document.getElementById(\'home-btn\').onclick=function(){
                    window.location.href="home.php";
                };
                     document.getElementById(\'gift-btn\').onclick=function(){
                    window.location.href="products.php?page=1";
                };
                     document.getElementById(\'card-btn\').onclick=function(){
                    window.location.href="cards.php";
                };
                        document.getElementById(\'editor-btn\').onclick=function(){
                    window.location.href="edit2.php";
                };
                      document.getElementById(\'orders-btn\').onclick=function(){
                    window.location.href="myorders.php";
                };
                    document.getElementById(\'cart-btn\').onclick=function()
            {
                window.location.href="cart.php";
            };
                </script>';}
                else
                {
                    echo '<script type="text/javascript">
                document.getElementById(\'home-btn\').onclick=function(){
                    window.location.href="home.php";
                };
                     document.getElementById(\'gift-btn\').onclick=function(){
                    alert("please login");
                };
                     document.getElementById(\'card-btn\').onclick=function(){
                    alert("please login");
                };
                
                        document.getElementById(\'editor-btn\').onclick=function(){
                    alert("please login");
                };
                      document.getElementById(\'orders-btn\').onclick=function(){
                    alert("please login");
                };
                    document.getElementById(\'cart-btn\').onclick=function()
            {
                alert("please login");
            };
                </script>';
                }   ?>
                <?php 
             if(!isset($_SESSION['username']))
             {echo '<a href="#" id="login-btn">';
                 echo 'LOGIN|SIGNUP' ;
             }else 
             { echo '<a id="dropdown">';
                 echo 'welcome  '.$_SESSION['username'];
             }?>      
                </a><div id="dropdown-content"><a href="logout.php">logout</a></div></div>
    <div id="head"> <a href="#">GIFT<span id="aa">A</span>GIFT</a><img id="logo" src="images/logo2.png">
         <script type="text/javascript">
       /* document.getElementById('dropdown').onclick=function(){
            
document.getElementById('dropdown-content').style.display='block';
        };*/
             $('#dropdown').click(function(){$('#dropdown-content').toggle();});
        </script>
  <div class="container-1">
      <span class="icon"><img src="images/search.png" width="22px"></span>
      <form action="search.php" method="post">
      <input type="search" id="search" placeholder="Search..."  onkeyup="showResult(this.value)" name="search" />
          <input type="submit" 
       style="position: absolute; left: -9999px; width: 1px; height: 1px;"
       tabindex="-1" />
      </form>      <div id="livesearch"></div>
  </div>
        <span id="cart-btn"><img src="images/cart.png" width="30px"><h1>CART</h1></span>
        </div>
        <!--   <div id="home-image"></div>-->
        <div class="form" id="form">
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          <form action="#" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="fname" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password"required autocomplete="off"/>
          </div>
          
          <input type="submit" name="submit1" class="button button-block" value="Get Started">
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="#" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password"required autocomplete="off"/>
          </div>
          
          
          
          <input type="submit" name="submit2" class="button button-block" value="Log In">
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> 
<!-- /form -->
      <!--  <div id="part2"> 
        <div id=""></div>
        </div>
        -->
        <script type="text/javascript">
              document.getElementById('cart-btn').onclick=function()
            {
                window.location.href="cart.php";
            };
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
$tbl_name="users"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$myusername=$_POST['email']; 
$mypassword=$_POST['password']; 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($db,$myusername);
$mypassword = mysqli_real_escape_string($db,$mypassword);
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$mypassword'";
$res=mysqli_query($db,$sql);
$count=mysqli_num_rows($res);
$rows=mysqli_fetch_array($res);

    if($count==1){
    

$_SESSION['username']=$myusername;
$_SESSION['password']=$mypassword;
$_SESSION['id']=$rows['userid'];
        $_SESSION['pinavail']=0;
echo 'success'; 
        ?>
        <script>
        window.location.href="home.php";
        </script>
        <?php
//if($rows['type']==1)
//header("location:adminprofile.php");
//else
//header("location:volunteerprofile.php");
}
    else
    {
        ?>
        <script>
        alert('wrong username or password');
        </script>
        <?php
    }

}
        if(isset($_POST['submit1']))
        {
            $host="localhost";
$username="root"; 
$password=""; 
$db_name="giftagift"; 
$tbl_name="users"; 
$db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
            
            $myusername=$_POST['email']; 
$mypassword=$_POST['password']; 
            $name=$_POST['fname'].' '. $_POST['lname'] ;
        $sql="insert into $tbl_name(username,email,password,type) values('$name','$myusername','$mypassword',01)";
echo $sql;
            $res=mysqli_query($db,$sql);
            $sql1='SELECT userid FROM $tbl_name WHERE email="'.$myusername.'"';
            $res1=mysqli_query($db,$sql1);
            $rows=mysqli_fetch_array($res1);
            if($res)
            {
               
                $_SESSION['pinavail']=0;
            ?>
        <script type="text/javascript">
        window.location.href="home.php";</script>
        <?php
            }
            else
            {
            ?>
        <script type="text/javascript">
        alert('This email already exists');</script>
        <?php
        }
        }
?>
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