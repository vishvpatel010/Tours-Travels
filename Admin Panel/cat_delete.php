<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from category where cat_id=$id");

if($del)
{
	header("location:cat_view.php");
}
else
{
		echo "not deleted.............";
}

?>