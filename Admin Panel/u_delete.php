<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from user_register where User_Id=$id");

if($del)
{
	header("location:user.php");
}
else
{
		echo "not deleted.............";
}

?>