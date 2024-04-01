<?php
session_start();
include_once'Connection.php';
$otp= $_SESSION['otp'];

    if(isset($_REQUEST['submit']))
    {
        $verifyotp=$_POST['otp'];

        if($otp == $verifyotp)
        {
            header("location:confirmpassword.php");
        }
        else
        {
            echo "OTP is icorrect";
            echo "<br>";
            echo "<a href='votp.php'>to go back</a>";
        } 
    }
    else
        {
            echo "Something is wrong please go back and re-enter the otp";
            echo "<br>";
            echo "<a href='votp.php'>to go back</a>";
        }
    
?>
