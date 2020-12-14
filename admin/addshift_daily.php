<?php
    session_start(); 
    if(!isset($_SESSION['user']))
    {
    	header("Location:index.php");
    }
        include 'config.php';
		$id=$_GET['id'];
		$query="select * from user_record where id=$id";
		$result=mysqli_query($con,$query);
		$row   =mysqli_fetch_assoc($result);

	   // echo '<pre>',var_dump($row['id']); echo '</pre>';

		$username = $row['name'];
		$userid = $row['id'];
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
		$s_date = "";
		$time_from = "";
		$time_to = "";
		$query="select * from shifttime where user_id=$userid";
		$results=mysqli_query($con,$query);
		$rows   =mysqli_fetch_assoc($results);
		$num          =  mysqli_num_rows($results);
		if($num > 0)
		{
		//	 echo '<pre>',var_dump($rows); echo '</pre>';
			 $s_date = $rows['shiftdate'];
			 $time_from = $rows['time_from'];
			 $time_to = $rows['time_to'];
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
		   include('admin_navbar.php');
		 ?>
		<div class="container-fluid">
			<?php include('admin_sidebar.php'); ?>
			<div class="dash">
				 <div class="row">
                    <div class="col-12">
                    	<div class="dash-heading">
                    		 Add Shift
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
					     	 		
					     	 		<form action="submitshift.php" method="post" autocomplete="off">
					     	 			  <div class="form-group">
					     	 			  	  <label>Username</label>
										      <input type="text" onchange="nameValidate(this)" class="form-control" placeholder="Username" id="name" name="name" value="<?php echo $username;?>" readonly>

										  <input type="hidden" onchange="nameValidate(this)" class="form-control" placeholder="Username" id="userid" name="userid" value="<?php echo $userid;?>" readonly>


										      <div id="name_error" style="color:red;"></div>
										  </div>
										 
					     	 			  <div class="form-group">
					     	 			  	 <label>Shift Date</label>
										      <input type="date" onchange="nameValidate(this)" class="form-control" id="shiftdate" name="shiftdate" value="<?php echo $s_date;?>">
										      <div id="name_error" style="color:red;"></div>
										  </div>


											<div class="form-group">
												<label>Shift Time</label>
												<br>
												<label>From</label>
												 <div id="phone_err" class="text-danger error"></div>
													<select name="from">
													<?php for($i = 0; $i < 24; $i++): ?>
													  <option value="<?= $i.':00'; ?>" <?php 
													  if($i.':00'==$time_from)
													  {
													  	echo "selected";
													  }
													  ?>><?= $i.':00'; ?></option>
													<?php endfor; ?>
													</select>
													<label></label>
													<label>To</label>
													<select name="to" >
													<?php for($i = 0; $i < 24; $i++): ?>
													  <option value="<?= $i.':00'; ?>" <?php 
													  if($i.':00'==$time_to)
													  {
													  	echo "selected";
													  }
													  ?>><?= $i.':00'; ?></option>
													<?php endfor ?>
													</select>
											</div>

										 
										   <button type="submit" name="submit" class="btn btn-sub">Submit</button>
									</form>
					     	     </div>	
						    	
								 

					     	 </div>
					     	
					     </div>
						    
			     </div>   
               		   
			</div>
			
		</div>	  	
		<script>
	
		function toggleSidebar(){
			document.getElementById('sidebar').classList.toggle('active');
		}
		function logOff()
		{
			$('#log_off').css({"transform":"rotate(180deg)","transition":"0.5s"});
			window.location.href = "logout.php";
		}

        function nameValidate(name)
        {
        	if(name.value=="")
        	{
        		$('#name_error').html('The Name Field is required');
        		return false;
        	}
        	else
        	{
        		$('#name_error').html('');
           		return true;
        	}

        }

		/*function formatPhone(obj) {
			
        numbers = obj.value.replace(/\D/g, ''),
		char = { 0: '(', 3: ') ', 6: ' - ' };
		obj.value = '';
		for (var i = 0; i < numbers.length; i++) {
		obj.value += (char[i] || '') + numbers[i];
		}
       
	}	

		function validateEmail(emailField){
			if(emailField.value!="")
			{

			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,3})$/;
			if (reg.test(emailField.value) == false) 
			{
			    jQuery(".invalid_email").show();
			    //jQuery('#email').addClass('error');
			    return false;
			}else{
			     jQuery('#email').removeClass('error');
			     jQuery(".invalid_email").hide();
			     return true;
			}
   
          }
	}
	function validatePassword(psw)
	{
		//alert(psw.value);
		if(psw.value!="")
	  {

       if(psw.value.length<=4)
       {

       	$('#password_error').html("Please enter password length altleast 5")
         	return false;

       }
       else
       {
       		$('#password_error').html("");

       }
     }

	}*/	
        </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</body>
</html>