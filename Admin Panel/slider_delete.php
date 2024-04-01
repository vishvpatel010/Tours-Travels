<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from slider where Id=$id");

if($del)
{
	header("location:slider_view.php");
}
else
{
		echo "not deleted.............";
}

?>