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
       <!--<img id="cart" class="cart" src="images/cart-add-icon.png" width="40px">
           -->  <h4> <?php echo $row['gname']; ?></h4>
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