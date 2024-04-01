<?php
session_start();
include'connection.php';
if (isset($_REQUEST['submit']))
{
  $email=$_POST['email'];
  $_SESSION['email']=$email;


  $log=mysqli_query($conn,"select * from user_register where email='$email'");
  $row=mysqli_fetch_array($log);
  $count=mysqli_num_rows($log);


  if($count==1)
  {
    header("location:email.php");
  }
  else
  {
   echo "Your E-mail ID Incorrect";
   echo"<br>";
  echo"<a href='forgetpassword.php'>to go back</a>";
  }
}
else{
  echo "data not found or not sufficient";
  echo"<br>";
  echo"<a href='forgetpassword.php'>to go back</a>";
}
?>