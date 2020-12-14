<?php
session_start();
include 'config.php';
include 'header.php';
$user_id =  $_SESSION['user'];
$check_data   ="select * from user_record where user_id='".$user_id."'";
$resultss     = mysqli_query($con,$check_data);
$num          = mysqli_num_rows($resultss);
?>

<section>
	<div class="container">
		<div class="row">
			<h2 class="heading">Profile</h2>
		</div>
		<table  border="1" class="table">
			<thead>
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>Phone</th>
					<th>State</th>
					<th>City</th>
				<tr>
			</thead>
		    <tbody>
		    	<?php


while($row = mysqli_fetch_assoc($resultss) )
{
	//echo '<pre>',var_dump($row); echo '</pre>';
	//$work_time=explode(",",$row['work_time']);
	echo '<tr>
			<td>'.$row['name'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$row['mobile'].'</td>
			<td>State</td>
			<td>City</td>
		</tr>';

}




		    	?>


		    </tbody>
		</table>
	</div>
</section>