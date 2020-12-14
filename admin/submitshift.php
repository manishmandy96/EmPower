<?php

include 'config.php';
if(isset($_POST['submit']))
{
	 $shiftdate = $_POST['shiftdate'];
	 $from      = $_POST['from'];
	 $to        = $_POST['to'];
	 $userid    = $_POST['userid'];


	 $check_data   = "select * from shifttime where user_id='".$userid."' ";
	 $resultss     =  mysqli_query($con,$check_data);
	 $num          =  mysqli_num_rows($resultss);


	 if($num > 0)
	 {

		$query          = "update shifttime set time_from= '".$from."',time_to='".$to."',shiftdate='".$shiftdate."' where user_id='".$userid."'";
		$result         = mysqli_query($con,$query);
		header("Location:addshift.php");

	 }
	 else
	 {
		$query          = 'INSERT INTO shifttime (user_id,time_to,time_from,shiftdate)
		VALUES ("'.$userid.'","'.$to.'","'.$from.'","'.$shiftdate.'");';

		$result  = mysqli_query($con,$query);
		if($result)
		{
		echo "data insert successfully";
		header("Location:addshift.php");
		}
	 }

}


?>