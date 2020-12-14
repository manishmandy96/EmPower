<?php
     
   include 'config.php';
   $id= $_GET['id'];
   $query="delete from  user_record where id=$id";
   $result=mysqli_query($con,$query);
   if($result)
   {
   	header("Location:view_record.php");
   }



 ?>