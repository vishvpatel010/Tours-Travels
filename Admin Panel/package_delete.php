<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from package where Id=$id");

if($del)
{
	header("location:package_view.php");
}
else
{
		echo "not deleted.............";
}

?>