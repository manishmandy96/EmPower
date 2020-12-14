<?php 

   echo $id=$_POST['id'];
   echo $name=$_POST['name'];
   echo $password=$_POST['password'];
   echo $email=$_POST['email'];
   echo $gender=$_POST['gender'];
   echo $mobile=$_POST['mobile'];
   echo $hourly_charge=$_POST['hourly_charge'];
   echo "<br>";
   $con=mysqli_connect('localhost','root','','mpvr1');
   $query="update user_record set name='$name',password='$password',gender='$gender',mobile='$mobile', email='$email',hourly_charge=$hourly_charge where id=$id";
   $result=mysqli_query($con,$query);
   if($result)
   {
   	    
    	 header('Location:view_record.php');
   }





?>