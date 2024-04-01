<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from cart where Id=$id");

if($del)
{
	header("location:cart1.php");
}
else
{
		echo "not deleted.............";
}

?>