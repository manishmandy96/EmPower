<?php
include 'config.php'; 
    session_start(); 
    if(!isset($_SESSION['user']))
    {
    	header("Location:index.php");
    }
 

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/admin_style.css"></link>
		<script type="text/javascript" src="../assets/js/jquery.js"></script>
	</head>    
	<body>
		<?php
         $query="select * from user_record where role='user' ORDER BY id DESC";
         $result=mysqli_query($con,$query);
         $num=mysqli_num_rows($result);
		?>
		
		<?php include('admin_navbar.php'); ?>
		<div class="container-fluid">
			<?php include('admin_sidebar.php');?>
			<div class="dash">
				 <div class="row">
                    <div class="col-12">
                    	<div class="dash-heading">
                    		 View User Records
                        </div>		
                    </div>	

                </div> 
               <div class="row">
					     
						    <div class="col-12">
						    	  <div class="box mt-4 bg-white">
						    	  	  <table class="table table-striped">
										    <thead>
										      <tr class="tb-head">
										      	<th>ID</th>
										        <th>UserId</th>
										        <th>Username</th>
										        <th>E-Mail Address</th>
										        <th>Password</th>
										        <th>Gender</th>
										        <th>Mobile</th>
										        <th>Delete</th>
										        <th>Edit</th>
										        <th>Status</th>
										      </tr>
										    </thead>
										    <tbody>
										      <?php 
										         if($num>0)
										         {
										         	$x=0;
										         	while($row=mysqli_fetch_assoc($result)) 
										         	{
										         	?>
													<tr>
														<td><?php echo  ++$x;?></td>
														<td><?php echo  $row['user_id']; ?></td>
														<td><?php echo  $row['name']; ?></td>
														<td><?php echo  $row['email']; ?></td>
														<td><?php echo  $row['password']; ?></td>
														<td><?php echo  $row['gender']; ?></td>
														<td><?php echo  $row['mobile']; ?></td>
														<td><a class="btn btn-danger" href="delete_record.php?id=<?php echo $row['id'];?>">Delete</a></td>
														<td><a class="btn btn-primary" href="edit_record.php?id=<?php echo $row['id'];?>">Edit</a></td>
														<td><?php 
														    if($row['status']==1)
														    {
														    	?>
														    	<a class="btn btn-success" href="user_status.php?id=<?php echo $row['id'];?>"> Active</a>
														    	<?php
														    }
														    else
														    {
														    	?>
														    	<a class="btn btn-warning text-white" href="user_status.php?id=<?php echo $row['id'];?>"> Block</a>
														    	<?php
														    }?></td>
														

														

													</tr>
										         	<?php
										         	}
										         }


										      ?> 	
										    
										    </tbody>
									  </table>
						    	  	    
								  </div>
						     </div>
					   
			     </div>   
               		   
			</div>
			
		</div>	  	
		<script>
  			function toggleSidebar(){
					document.getElementById('sidebar').classList.toggle('active');}
			function logOff()
			{
				   $('#log_off').css({"transform":"rotate(180deg)","transition":"0.5s"});
				   window.location.href = "logout.php";}		
        </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</body>
</html>