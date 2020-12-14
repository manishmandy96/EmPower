<?php 

   $email=$_GET['email'];
   $con=mysqli_connect('localhost','root','','mpvr');
   $query="select * from user_record where email='$email'";
   $result=mysqli_query($con,$query);
   $num=mysqli_num_rows($result);
   if($num>0)
    {
      echo "success";	
    }
    else
    {
    	echo "fail";
    }



?>