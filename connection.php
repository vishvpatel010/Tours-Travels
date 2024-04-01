<?php

include 'hotel_connection.php';
$conn=mysqli_connect("localhost","root","","tour_travel");

if (!$conn)
{
	die("not connected".mysqli_error());
}

?>