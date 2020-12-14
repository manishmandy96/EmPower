<?php
session_start();
include 'config.php';
include 'header.php';
$user_id =  $_SESSION['user'];
$user_data  ="select * from user_record where user_id='".$user_id."'";
$results_user    = mysqli_query($con,$user_data);
$nums             = mysqli_num_rows($results_user);
$data_s              = mysqli_fetch_assoc($results_user);
$hourly_charge = $data_s['hourly_charge'];


$check_data   ="select * from user where user_id='".$user_id."'";
$resultss     = mysqli_query($con,$check_data);
$num          = mysqli_num_rows($resultss);
?>

<section>
	<div class="container">
		<div class="row">
			<h2 class="heading">Time & activity report</h2>
		</div>
		<table  border="1" class="table">
			<thead>
				<tr>
					<th>Project</th>
					<th>To-dos</th>
					<th>Time</th>
					<th>Activity</th>
					<th>Earned</th>
					<th>Notes</th>
				<tr>
			</thead>
		    <tbody>
		    	<?php
if($num > 0)
{

while($row = mysqli_fetch_assoc($resultss) )
{
	//echo '<pre>',var_dump($row); echo '</pre>';
	$work_time=explode(",",$row['work_time']);
	$sum=0;
	foreach($work_time as $t)
	{
		$timestr = $t;

		$parts = explode(':', $timestr);

		$seconds = ($parts[0] * 60 * 60) + ($parts[1] * 60) + $parts[2];
		$sum = $seconds + $sum;
	}
	$total_working_time =  gmdate("H:i:s", $sum);
    $sec_charge = $hourly_charge/3600;
	$total_earn  = $sum * $sec_charge;
	echo '<tr>
		<tr class="current_dayss"><th>'.$row['current_day'].'</th></tr>
		<tr>
			<td><h6>EmPower</h6></td>
			<td></td>
			<td>'.$total_working_time.'</td>
			<td>Activity</td>
			<td>'.$total_earn.'</td>
			<td>'.$row['notes'].'</td>
		</tr>
	</tr>';

}



}
		    	?>


		    </tbody>
		</table>
	</div>
</section>