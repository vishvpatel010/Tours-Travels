<?php
session_start();
require 'Admin Panel/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'tourstravels47@gmail.com';          // SMTP username
$mail->Password = 'srxxeuionszqgbus';              // SMTP password
$mail->SMTPSecure = 'Tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$id=mysqli_insert_id($conn);
$contact=mysqli_query($conn,"select *from contact_us where id=$id");
$us=mysqli_fetch_array($contact);
$mail->setFrom($us['email'], 'Contact Team');
$mail->addReplyTo('tourstravels47@gmail.com', $us['name']);
$mail->addAddress('tourstravels47@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<p>Name:- <b>'.$us['Name'].'</b></p><br><p>from:- <b>'.$us['Email'];
$bodyContent .='</b></p><br><p>subject:- <b>'.$_PsOST['Subject'].'</b></p><br><p>message:- <b>'.$us['Message'].'</b></p>';

$mail->Subject = 'Contact Team';
$mail->Body    = $bodyContent;

         
if ($mail->send) {
     $s_contact="Comment send successfull.............";
    header("location:contact.php");
}
else {
    $n_comment="Comment not send.........";
    header("location:contact.php");
}
?>