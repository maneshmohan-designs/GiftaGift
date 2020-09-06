<?php
$db=mysqli_connect('localhost','root','','election')OR DIE('cannot connect');
 $table='contestants';
$sql1="select * from $table";
$res1=mysqli_query($db,$sql1);
   while($row1=mysqli_fetch_array($res1))
    {
       $table2='voters';
       $vote=$row1['id'];
       $sql2="select * from voters where vote='$vote'";
       $res2=mysqli_query($db,$sql2);
        $count=mysqli_num_rows($res2);
       echo 'vote for'.$vote.'is'.$count;
   }
       
?>