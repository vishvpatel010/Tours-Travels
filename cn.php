
<?php
session_start();
include'Connection.php';

    if(isset($_REQUEST['submit']))
    {
        $new= $_POST['opassword'];
        $confirm=$_POST['npassword'];

        if($new==$confirm)
        {
        	$npass=$new;
            $uid=$_SESSION['uid']['User_Id'];
        $sql=mysqli_query($conn,"update user_register set password='$npass'where User_Id=$uid");
        $sql1=mysqli_query($conn,"select *from user_register where User_Id=$uid");
        $raw=mysqli_fetch_array($sql1);
        $_SESSION['uid']=$raw;
        if($sql)
         {
               header("location:index.php");
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