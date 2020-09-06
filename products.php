 <!doctype html>
<meta charset="utf-8">
<html>
    <head>
    <link rel="stylesheet" href="css/products.css">
        
        <link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="waves.css" rel="stylesheet">
        <script src="jquery-2.1.1.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    </head>
<body>
        
    <nav>
        <?php
    include_once('index.php');
        ?>
    </nav>
    <div id="products">
    <?php
    
$db=mysqli_connect('localhost','root','','giftagift')OR DIE('cannot connect');
    $table='products';
    mysqli_select_db($db,'giftagift');
    
    $divisions=10;
    $sql="select * from $table";
    $res=mysqli_query($db,$sql);
        $number_of_rows=mysqli_num_rows($res);
    $count=mysqli_num_rows($res);
        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
            $limit1=0;
            $limit2=0;
            //echo $limit1.':'.$limit2;
            if($page==1)
            {
                $limit1=0;
                $limit2=$divisions;
            }
            else
            {
                $limit2=$divisions;
                $limit1=( ($page-1)*$divisions )+1;
            }
            $sql="select * from $table LIMIT $limit1,$limit2";
            echo $sql;
            $res=mysqli_query($db,$sql);
        //echo $sql;
        }
    ?>
    <ul class="gifts">
        <?php
    while($row=mysqli_fetch_array($res))
    {
    ?>
        <li class="box waves-effect" id="bx1">
    <a href="#">
        <img src="<?php echo $row['gimage']; ?>">
        <span class="gid"><?php echo $row['gid']; ?></span>
       <img id="cart" class="cart" src="images/cart-add-icon.png" width="40px">
        <span id="prod-name"> <?php echo $row['gname']; ?></span>
        <span id="price">RS.<?php echo $row['price']; ?></span>
            </a>
        </li>
    <?php
    }
        ?>
     <div>
        <?php
         //echo $number_of_rows;
         $i=1;
          echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'"';
         if(isset($_GET['page']))
             if($_GET['page']==$i)
                 echo 'style="color:#3FA2B7;"';
         echo '>'.$i.'</a> | ';
         $val=$number_of_rows/$divisions;
          $con=ceil($val);
        
         for($i=2;$i<=$con;$i++)
         {
              echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'"';
         if(isset($_GET['page']))
             if($_GET['page']==$i)
                 echo 'style="color:#3FA2B7;"';
         echo '>'.$i.'</a> | ';
         }
         ?>
     </div><hr>
    <script type="text/javascript">
         $('.cart').on('click',function(event){
          event.stopPropagation();
              var ab=$(this).siblings('span.gid').html(); 
             
             window.location.href="addtocart.php?gid="+ab;
             
      });
      $('.box').on('click',function(){
          var a=$(this).children('a').children('span.gid').html();
      $('.cart').on('click',function(){
          Event.stopPropagation();
      });
          window.location.href="details.php?gid="+a;
      });

    </script>   
        
    </ul>
    </div>

    </body>
    <script type="text/javascript">
      

    </script>
</html>
