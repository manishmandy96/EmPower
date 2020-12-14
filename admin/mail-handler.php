<?php

function sendMail($name,$email,$password){
require'pp/PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sanjub02732@gmail.com';                 // SMTP username
$mail->Password = 'npfbpevwintqcmvi';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
// $email ="krishnabtsit@gmail.com";

// $name ="krishna";

$mail->setFrom('sanjub02732@gmail.com', 'Mailer');
$mail->addAddress($email,$name);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo($email, $username);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
	$mail->WordWrap = 50;                              // set word wrap
$mail->AddEmbeddedImage("GM Community Profile Image.jpg", "icon.png", "image/jpeg");

$msg = "Username ".$email.'<br>';
$msg .= "Password ".$password;

$mail->Subject = 'Verify Mail';
$mail->Body    = $msg;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->send();

}


?>