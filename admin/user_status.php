<?php 
include 'config.php';
$id=$_GET['id'];
$query="select * from user_record where id=$id";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num>0)
{
$row=mysqli_fetch_assoc($result);
if($row['status']==1)
{
	$query="update user_record set status= 0 where id=$id";
	mysqli_query($con,$query);
	 header('Location:view_record.php');

}
else
{
	$query="update user_record set status= 1 where id=$id";
	mysqli_query($con,$query);
	 header('Location:view_record.php');
}
}
else
{
echo "record not found !";
}

?>