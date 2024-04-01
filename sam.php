<?php

include 'connection.php';

$sql=mysqli_query("select *from sub_cat");

while($row=mysqli_fetch_array($sql)) { 

	echo $row['sub_cat_name']."<br>";

}

?>



