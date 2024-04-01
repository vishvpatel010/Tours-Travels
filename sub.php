<?php
$q = $_GET['q'];
session_start();    
$id=$_SESSION['id'];
include'connection.php';
$select=mysqli_fetch_array(mysqli_query($conn,"select *from sub_cat where sub_cat_id=$id"));
if (empty($_SESSION['hotel_id'])) {
	# code...
}
else{
$room_id=$_SESSION['hotel_id'];
    $hotel1=mysqli_query($con,"select *from rooms where room_id=$room_id");
    $select1=mysqli_fetch_array($hotel1);
}

?>
<!DOCTYPE html>
<html>
<body>

<p>Total Price:-  <?php if (empty($_SESSION['hotel_id'])) {

                         echo ($select['sub_price']+$select['hotel_price'])*$q;
                         }
                         else
                         {
                            echo ($select['sub_price']+$select1['price'])*$q;
                         } ?></p>

</body>
</html>