<?php 
	session_start(); 
	include 'config.php';
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
           $id=$_GET['id'];
           $query="select * from user_record where id=$id";
           $result=mysqli_query($con,$query);
           $row   =mysqli_fetch_assoc($result);

          // echo '<pre>',var_dump($row); echo '</pre>';


           $male="";
           $female="";
           if($row['gender']=='male')
           {
           	$male="checked";
           }
           else
           {
           	$female="checked";
           }
         ?>

		<?php include('admin_navbar.php') ?>
		<div class="container-fluid">
			<?php include('admin_sidebar.php') ?>
			<div class="dash">
				 <div class="row">
                    <div class="col-12">
                    	<div class="dash-heading">
                    		 Edit User Record
                        </div>		
                    </div>	

                </div> 	
               <div class="row">
					     <div class="col-12">
					     	 <div class="dash-form">
					     	 	<div class="form-box">
					     	 		<?php
                                        if(isset($_SESSION['status']))
                                        {
                                        	?>
                                        	<div class="alert alert-success">
                                        		<?php
                                        		echo $_SESSION['status'];
                                        		?>
                                        	</div>
                                        	<?php
                                        	unset($_SESSION['status']);
                                        }

					     	 		 ?>
					     	 		<form action="edit_handler.php" method="post">
					     	 			  <div class="form-group">
					     	 			  	<label>Username</label>
					     	 			  	<input type="text" name="id" value="<?php echo $row['id'];?>" hidden>


										      <input type="text" class="form-control " value="<?php echo $row['name'];?>" placeholder="Username" id="user" name='name'required>


										  </div>
										  <div class="form-group">
										  	<label>Email</label>
										      <input type="email" class="form-control" value="<?php echo $row['email'];?>"placeholder="E-mail address" id="email" name="email" required>
										  </div>
										  <div class="form-group">
										  		<label>Passwords</label>
										      <input type="password" class="form-control" value="<?php echo $row['password'];?>" placeholder="Password" id="pwd" name="password" required>
										  </div>
										  <div class="form-group">
										  	<div class="form-check-inline">
												  <label class="form-check-label">
												     Gender
												  </label>
											 </div>
											  <div class="form-check-inline">
												  <label class="form-check-label">
												    <input type="radio" class="form-check-input" value="male" name="gender" <?php echo $male;?> >Male
												  </label>
												</div>
												<div class="form-check-inline">
												  <label class="form-check-label">
												    <input type="radio" class="form-check-input" value="female" name="gender" <?php echo $female;?> >Female
												  </label>
												</div>
										  </div>
										  <div class="form-group">
										  	<label>Hourly Wage</label>
										      <input type="text" class="form-control" value="<?php echo $row['hourly_charge']; ?>"  placeholder="Hourly Charge" id="hourly_charge" name="hourly_charge" autocomplete="off" >
										  </div>
										   <div class="form-group">
										    	<label>Mobile Number</label>
										      <input type="text" class="form-control " value="<?php echo $row['mobile'];?>"placeholder="Phone no" id="phone" name='mobile' maxlength="10" required>
										  </div>
										   <button type="submit" class="btn btn-sub">Update</button>
									</form>
					     	     </div>	
						    	
								 

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