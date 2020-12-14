<?php session_start(); 
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
		<style type="text/css">
			
			.dashboard{background:#1e1f1f;}
			.dash-heading{
				    background:#1e1f1f;;
    
    
    color: #fff;
    margin-top: 20px;
    border-radius: 5px;
    padding: 12px 20px;
    
			}
				      
     	</style>
	</head>    
	<body>
		<?php include('admin_navbar.php') ?>
		<div class="container-fluid">
			<?php include('admin_sidebar.php') ?>
			<div class="dash">
                <div class="row">
                    <div class="col-12">
                    	<div class="dash-heading">
                    		  Welcome To Dashboard 
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