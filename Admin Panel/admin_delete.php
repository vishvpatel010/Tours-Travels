<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from admin_register where Id=$id");

if($del)
{
	header("location:admin_view.php");
}
else
{
		echo "not deleted.............";
}

?>