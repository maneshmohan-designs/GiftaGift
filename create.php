<?php
error_reporting(!E_ALL);

?>
<!doctype html>
<meta charset="utf-8">
<html>
   <head>
     
        <link rel="stylesheet" href="css/products.css">
        <link rel="stylesheet" href="waves.css">
       <link rel="stylesheet" href="index.css">
     
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-2.1.1.js"></script>
    </head>
    <body>
       <nav>
            <div id="top"><ul><li id="home-btn">home</li><li id="gift-btn">adduser</li></ul><?php 
             session_start();
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
            
                <script type="text/javascript">
                document.getElementById('home-btn').onclick=function(){
                    window.location.href="create.php";
                };
                     document.getElementById('gift-btn').onclick=function(){
                    window.location.href="addprintuser.php";
                };
                </script>
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
     
        
       
    <form enctype="multipart/form-data" method="post" action="upload.php" style="position:relative; top:150px; z-index:99999;">
    <label for="gname">Gift name</label><input type="text" name="gname">
  <input type="file" size="32" name="image_field" value="">
        price<input type="number" name="price" >
        description<input type="text" name="desc">
  <input type="submit" name="Submit" value="upload">
        

        </form>
        
         <div id="products">
    <?php
    
$db=mysqli_connect('localhost','root','','giftagift')OR DIE('cannot connect');
    $table='products';
    mysqli_select_db($db,'giftagift');
    
    $sql="select * from $table";
$res=mysqli_query($db,$sql);
    $count=mysqli_num_rows($res);
    ?>
    <ul class="gifts">
        <?php
    while($row=mysqli_fetch_array($res))
    {
    ?>
        <li class="box" id="bx1">
    <a href="#">
        <img src="<?php echo $row['gimage']; ?>">
        <span class="gid"><?php echo $row['gid']; ?></span>
        <img id="cart" class="cart" src="images/delete-btn.png" width="40px">
           <h4> <?php echo $row['gname']; ?></h4>
            </a>
        </li>
    <?php
    }
        ?>
     
    <script type="text/javascript">
      $('.box').on('click',function(){
          var a=$(this).children('a').children('span.gid').html();
      
          window.location.href="edit.php?gid="+a;
      });
 $('.cart').on('click',function(event){
          event.stopPropagation();
              var ab=$(this).siblings('span.gid').html(); 
             
             window.location.href="delete-gift.php?gid="+ab;
             
      });
    </script>   
        
    </ul>
    </div>
        
    </body>
    <style>
    #up
        {
            display:block;
            position:absolute;
            top:20%;
            font-family: 
sans-serif;
        }
      #dropdown {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

#dropdown-content {
    display: none;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    height: 30px;
    border-width: thick;
    background-color: white;
    
}

#dropdown:hover #dropdown-content {
    display: block;
}
    </style>
</html>