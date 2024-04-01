<?php
session_start();
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$user_email= $_SESSION['email'];

$otp= rand(1000,9999);

$_SESSION['otp']=$otp;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'webdummy12@gmail.com';          // SMTP username
$mail->Password = 'ppuzzktyfqfcksdd';              // SMTP password
$mail->SMTPSecure = 'Tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom($user_email, 'Party Management');
$mail->addReplyTo($user_email, 'Admin');
$mail->addAddress($user_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>It is email for otp</h1>';
$bodyContent .= '<p>Your otp for admin login is:-  <b>'.$otp.'</b></p>';

$mail->Subject = 'Email from Localhost by dhruvil';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location:votp.php');
}
?>
