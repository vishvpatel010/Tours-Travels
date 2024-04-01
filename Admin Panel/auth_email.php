<?php
session_start();

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$user_email= $_SESSION['aemail'];
		
$otp= rand(1000,9999);

$_SESSION['aotp']=$otp;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'tourstravels47@gmail.com';          // SMTP username
$mail->Password = 'srxxeuionszqgbus';              // SMTP password
$mail->SMTPSecure = 'Tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom($user_email, 'Tours and Travels');
$mail->addReplyTo($user_email, 'User');
$mail->addAddress($user_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>It is email For Reset Your Password</h1>';
$bodyContent .= '<p>Your otp for Admin login is:- <b>'.$otp.'</b></p>';

$mail->Subject = 'Verification Mail From Tours and Travels';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location:auth_verify.php');
}
?>
