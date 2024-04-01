<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from menu where menu_id=$id");

if($del)
{
	header("location:menu_view.php");
}
else
{
		echo "not deleted.............";
		echo"<a href='menu_view.php'>to go back</a>";
}

?>