<?php
include'connection.php';

$id=$_GET['id'];
	
$del=mysqli_query($conn,"delete from faq where Faq_Id=$id");

if($del)
{
	header("location:faq_view.php");
}
else
{
		echo "not deleted.............";
}

?>