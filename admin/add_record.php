<?php
    include 'config.php';
    include_once 'mail-handler.php';
    session_start(); 
    function unique()
    {
      $str1="mpwr";
      $str2=substr(time(),6,4);
      return $str1.$str2;
    }
	  $name=$_POST['name'];
	  $password=$_POST['password'];
	  $email=$_POST['email'];
	  $gender=$_POST['gender'];
	  $mobile=$_POST['mobile'];
    $hourly_charge=$_POST['hourly_charge'];
	  $user_id=unique();
    $status=1;
    $role="user";
    $query="select * from user_record where email='$email'";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
     if($num>0)
     {
        $_SESSION['email_status']="Sorry,This Email Id is Already Exist";
        header('Location:admin_add_record.php');
     }
     else
     {
        $query="insert into user_record values(default,'$name','$password','$gender','$mobile','$user_id',$status,'$role','$email',$hourly_charge)";
        $result=mysqli_query($con,$query);
        if($result)
        {
          $_SESSION['status']="Record insert successfully and sent login information to the user email";
          sendMail($name,$email,$password);
          header('Location:view_record.php');
        }
        else
        {
          echo "failed";
        }
     }


   
?>