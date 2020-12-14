<?php
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
		<?php include('admin_navbar.php') ?>
		<div class="container-fluid">
			<?php include('admin_sidebar.php') ?>
			<div class="dash">
				 <div class="row">
                    <div class="col-12">
                    	<div class="dash-heading">
                    		 Add User Record
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
					     	 		
					     	 		<form action="add_record.php" method="post" autocomplete="off">
					     	 			  <div class="form-group">
										      <input type="text" onchange="nameValidate(this)" class="form-control" placeholder="Username" id="name" name="name">
										       <div id="name_error" style="color:red;"></div>
										  </div>
										 
										  <div class="form-group">
										      <input type="email" class="form-control" placeholder="E-mail address" id="email" name="email" onblur="validateEmail(this);">
										       <div id="email_err" class="text-danger error"></div>
										       <div id="email_error" class="invalid_email" style="display: none;">Email is invalid.</div>
   										 <?php
	                                        if(isset($_SESSION['email_status']))
	                                        {
	                                        	?>
	                                        	<div class="text-danger" id='email_err_already'>
	                                        		<?php
	                                        			echo $_SESSION['email_status'];
	                                        		?>
	                                        	</div>
	                                        	<?php
	                                        	unset($_SESSION['email_status']);
	                                        }

						     	 		 ?>
										  </div>
                                         <div class="form-group">
										      <input type="password" class="form-control" placeholder="Password" id="password" name="password" onchange="validatePassword(this)">
										       <div id="password_error" class="text-danger error"></div>
										  </div>
										 
										  <div class="form-group">
										  	
											  <select name="gender"class="gender" id="gender" placeholder="Gender">
											  	<option selected="selected">Select Gender</option>
											  	<option value="male">Male</option>
											  	<option value="female">Female</option>
											  </select>
											  <div id="gender_err" class="text-danger error"></div>
										  </div>
										  <div class="form-group">
										      <input type="text" class="form-control"  placeholder="Hourly Wage" id="hourly_charge" name="hourly_charge" autocomplete="off" >
										  </div>
										   <div class="form-group">
										      <input type="text" class="form-control"  placeholder="Phone no" id="phone" name='mobile' onkeypress="formatPhone(this);" autocomplete="off" maxlength="16" >
										  </div>
											<div class="form-group">
												 <div id="phone_err" class="text-danger error"></div>
												<textarea class="form-control" placeholder="Address"  cols="5"></textarea>
											</div>

										 
										   <button type="submit" class="btn btn-sub">Submit</button>
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