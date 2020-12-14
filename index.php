<?php session_start();
error_reporting(0);
if(isset($_SESSION['user']))
  {
    
    header('Location:home.php');
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
               .modal-header        
               {
                  display: block;
               }
                .modal-header p{
                    text-align: center;
                    font-size: 15px;
                    margin-top: 15px;
                    padding: 9px;
                    background: red;
                    color: #fff;
                    font-weight: 600;
                    font-family: sans-serif;
                }
      </style>  

  </head>
  <body style="background:#117a8b;">
    <div class="container">
 

  <!-- The Modal -->
  <?php
  if(!$_GET['logout'] == "1"):
  ?>
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        
          <h5 class="modal-title">COVID-19</h5>
          <?php
          if($_GET['covid'] == 1)
          {
            echo '<p class="alert alert-danger">Covid patients can not be login.</p>';
          }
          ?>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <strong> Symptoms :</strong>
               <div style="font-size: 14px;">
                     <div>
                        Signs and symptoms of coronavirus disease 2019 (COVID-19) may appear two to 14 days after exposure. This time after exposure and before having symptoms is called the incubation period. Common signs and symptoms can include:
                     </div>
                     <ul>
                      <li>Fever</li>
                      <li>Cough</li>
                      <li>Tiredness</li> 
                    </ul>
                     <div> Early symptoms of COVID-19 may include a loss of taste or smell.
                      Other symptoms can include:
                      </div>
                      <ul>
                        <li>Shortness of breath or difficulty breathing</li>
                        <li>Muscle aches</li>
                        <li>Chills</li>
                        <li>Sore throat</li>
                        <li>Runny nose</li>
                        <li>Headache</li>
                        <li>Chest pain</li>
                        <li>Pink eye (conjunctivitis)</li>
                   </ul>   
              </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <div style="margin:0 auto; font-size: 14px;">
          Are You facing any of these symptoms?
          <a style="padding:3px 15px;" href="index.php?covid=1"  class="btn btn-danger" >Yes</a>
          <button style="padding:3px 15px; background:#117a8b; color:#fff;" type="button" class="btn" data-dismiss="modal">No</button>
         </div>
        </div>
        
      </div>
    </div>
  </div>
  <?php endif;?>
</div>
      <div class="container">
             <div class="main">
              <div class="form-box">
                    <div class="user-icon text-center mt-2">
                         <i class="fa fa-user-circle" aria-hidden="true" style="font-size:60px; color: #6c757d;"></i>
                    </div>
                    <h4 class="text-center">User</h4>
                 
                    <form id="user-form" class="mt-4 mb-2" action="login_handler.php" method="POST">
                          <div class="form-group">
                              <input type="email" class="form-control" id="email"  placeholder="Username (email)" name="email">
                              <div style="color:red;" id="email_error"></div>
                          </div>
                          <div class="form-group">
                               <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                               <div style="color:red;" id="password_error"></div>
                          </div>
                          <button  style="color:#fff;" type="submit" class="btn btn-log">Login</button>
                    </form> 
               </div> 
          </div>
      </div> 
     <script>
            $(document).ready(function(){
             setTimeout(function() {
             $('#myModal').modal({backdrop: 'static', keyboard: false},'show');
             }, 100); 
             $('#user-form').submit(function(){
                var email=$('#email').val();
                var pass=$('#password').val();
                if(email == "" || pass == "")
                {
                 
                  if(email == "")
                  {
                    $('#email_error').html('The Email Field is Required');
                  }
                  else
                  {
                      $('#email_error').html('');
                  }
                  if(pass == "")
                  {
                    $('#password_error').html('The Password Field is Required');
                  }
                  else
                  {
                      $('#password_error').html('');
                  }
                   return false;
                }
                else
                {
                  $('#email_error').html('');
                  $('#password_error').html('');
                  return true;

                }
             });
            
          });
            




     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
