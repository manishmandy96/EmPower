<?php 
    include 'config.php';
    session_start();
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from user_record where email='$email' AND password='$password'";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    if($num>0)
    {
        $query="select * from user_record where role='admin'";
        $result=mysqli_query($con,$query);
        $num=mysqli_num_rows($result);
        if($num>0)
        {
             $_SESSION['user']='user';
             header('Location:admin_dashboard.php');
        }
        else
        {
            header('Location:index.php');
        }
    }
    else
    {
       header('Location:index.php');
    }
?>