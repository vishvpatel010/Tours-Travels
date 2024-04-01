<?php
//include'connection.php';
$conn=mysqli_connect("localhost","root","","tourist");

if (!$conn)
{
    die("not connected".mysqli_error());
}

$id=$_GET['o_id'];
	
$del=mysqli_query($conn,"delete from orders where order_id=$id");

if($del)
{
	header("location:order.php");
}
else
{
		echo "not deleted.............";
}

?>