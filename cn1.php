
<?php
session_start();
include'Connection.php';

$email=$_SESSION['email'];

    if(isset($_REQUEST['submit']))
    {
        $new= $_POST['opassword'];
        $confirm=$_POST['npassword'];

        if($new==$confirm)
        {
        	$npass=$new;
        $sql=mysqli_query($conn,"update user_register set password='$npass'where email='$email'");
        if($sql)
         {
               header("location:logout.php");
         }
        }
        else
        {
            echo "your password not match ....!!";
        }
    }
     else
        {
            echo "Something is wrong please go back and re-enter the otp";
            echo "<br>";
            echo "<a href='confirmpass.php'>to go back</a>";
        }
?>