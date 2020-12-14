<?php
include 'config.php';
$mydate= getdate();

$year  = $mydate['year'];
$month = $mydate['mon'];
$day   = $mydate['mday'];
$currentday = date('D, M d, Y');

date_default_timezone_set("Canada/Atlantic");
$format    = "%H:%M:%S";
$strf      = strftime($format);
$user_id   = $_POST['userid'];
$work_time = $_POST['worktime'];
$notes     = $_POST['notes'];


$check_data   = "select * from user where user_id='".$user_id."' and day = '".$day."' and month='".$month."' ";
$resultss     =  mysqli_query($con,$check_data);
$num          =  mysqli_num_rows($resultss);


if($num > 0)
{
	$data           = mysqli_fetch_assoc($resultss);
	$prev_times     = $data['work_time'];
    $newtime        = $prev_times.','.$work_time;
    $query          = "update user set work_time= '".$newtime."',notes='".$notes."' where user_id='".$user_id."' and day = '".$day."' and month='".$month."' ";
    $result         =mysqli_query($con,$query);
}
else
{

	$query   = 'INSERT INTO user (user_id,day,month,year,work_time,checkout_time,current_day,notes)
	VALUES ("'.$user_id.'","'.$day.'","'.$month.'","'.$year.'","'.$work_time.'","'.$strf.'","'.$currentday.'","'.$notes.'");';
	$result  = mysqli_query($con,$query);
	if($result)
	{
		echo "data insert successfully";
	}
}
?>