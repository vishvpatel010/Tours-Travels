<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from sub_cat where sub_cat_id=$id");

if($del)
{
	header("location:sub_view.php");
}
else
{
		echo "not deleted.............";
}

?>