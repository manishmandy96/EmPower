<?php 
    include 'config.php';
    session_start();
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from user_record where email='$email' AND password='$password' AND role='user'";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    
    if($num>0)
    {
    	
      $query="select * from user_record where email='$email' AND status=1";
      $result=mysqli_query($con,$query);
      $num=mysqli_num_rows($result);
      
     if($num>0)
       {
         $row=mysqli_fetch_assoc($result);
         $_SESSION['user']=$row['user_id'];
         header("Location:home.php");
       }
       else
       {
        echo 'Your account has not been activated yet.please contact your admin..!';

        
       }
   }
    else
    {
    
    	echo 'You have entered wrong credentials';
    
    }




?>