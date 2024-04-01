<?php
session_start();
require 'Admin Panel/PHPMailer/PHPMailerAutoload.php';
if (isset($_REQUEST['contact'])) {
                                   // TCP port to connect to

$mail->setFrom($_POST['email'], 'Contact Team');
$mail->addReplyTo('tourstravels47@gmail.com', $_POST['name']);
$mail->addAddress('tourstravels47@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML


$bodyContent .= '<p>Name:- <b>'.$_POST['name'].'</b></p>';
$bodyContent .= '<p>from:- <b>'.$_POST['email'].'</b></p>';
$bodyContent .= '<p>subject:- <b>'.$_POST['subject'].'</b></p>';
$bodyContent .= '<p>message:- <b>'.$_POST['message'].'</b></p>';


$mail->Subject = 'Contact Team';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('contact.php');
}
}
$mail = new PHPMailer;

$user_email= $_SESSION['email'];
		
$otp= rand(1000,9999);

$_SESSION['otp']=$otp;

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

$bodyContent = '<h1>It is email for otp</h1>';
$bodyContent .= '<p>Your otp for user login is:- <b>'.$otp.'</b></p>';

$mail->Subject = 'Email from Tours and Travels';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location:verifyotp.php');
}

?>
