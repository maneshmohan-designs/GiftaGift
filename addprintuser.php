<html>
     <head>
        
        <link rel="stylesheet" href="css/products.css">
        <link rel="stylesheet" href="waves.css">
         <link rel="stylesheet" href="form.css">
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
     
    <form method="post" action="addprintuser.php">
        print location<br><input type="number" name="printloc"><br>
        print name<input type="text" name="printname">
        password<input type="password" name="password">
        <input type="submit" name="submit" value="add">
    
    </form>
    <?php
     $db=mysqli_connect('localhost','root','','giftagift')OR DIE('cannot connect');
    $table='printusers';
        
    mysqli_select_db($db,'giftagift');
$sql="select * from $table";
$res=mysqli_query($db,$sql);


echo '<table style="position:relative; top:150px;">';
    echo '<tr><th>ID</th><th>Password</th><th>Location</th><th>Name</th></tr>';
while($rows=mysqli_fetch_array($res))
{
    echo '<tr>';
 echo '<td>'.$rows['printid'].'</td> <td> '.$rows['password'].'</td> <td>'.$rows['printloc'].'</td> <td>'.$rows['printname'].'</td>';
    echo '</tr>';
}
echo '</table>';
    ?>
    </body>
    <?php
    if(isset($_POST['submit']))
    {
        $db=mysqli_connect('localhost','root','','giftagift')OR DIE('cannot connect');
    $table='printusers';
        
    mysqli_select_db($db,'giftagift');
        $password=$_POST['password'];
        $printname=$_POST['printname'];
        $printloc=$_POST['printloc'];
        $sql="insert into $table(password,printloc,printname) values('$password','$printloc','$printname')";
        $res=mysqli_query($db,$sql);
        header("location:create.php");
    
    }


    ?>
    <style>
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
        form
        {
            display:block;
            top:30%;
            position:absolute;
            margin-top: 
                10%;s
            
        }
       
        input
        {
            
        }
</style>
</html>