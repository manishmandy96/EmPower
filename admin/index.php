
<?php
  session_start();
  if(isset($_SESSION['user']))
  {
    
    header('Location:admin/admin_dashboard.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="assets/js/jquery.js"></script>
      <style>
            .form-box{
              width:30%;
              background: #fff;
              margin:0 auto;
              padding:15px;
              margin-top:50px;
              border-radius:10px;
            }
            .form-group{
              margin-bottom:20px;
            }
            .form-control{
              border-radius: 25px;
              padding: 21px;
            }
            .btn-log{
                border-radius: 25px;
                width: 100%;
                padding: 8px;
                background:#117a8b;
                color: #fff;
                        }
               h4{
               color: #6c757d;
               }         
      </style>  

  </head>
  <body style="background:#117a8b;">
  
      <div class="container">
             <div class="main">
              <div class="form-box">
                    <div class="user-icon text-center mt-2">
                         <i class="fa fa-user-circle" aria-hidden="true" style="font-size:60px; color: #6c757d;"></i>
                    </div>
                    <h4 class="text-center">Admin</h4>
                   <?php if(isset($_SESSION['error']))
                          {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                          }
                    ?>
                    <form class="mt-4 mb-2" action="login_handler.php" method="POST">
                          <div class="form-group">
                              <input type="email" class="form-control" id="username" placeholder="Username (email)" name="email" required>
                          </div>
                          <div class="form-group">
                               <input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required>
                          </div>
                          <button  style="color:#fff;" type="submit" class="btn btn-log">Login</button>
                    </form> 
               </div> 
          </div>
      </div> 

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
