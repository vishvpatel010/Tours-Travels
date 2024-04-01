<?php 

session_start();
if (empty($_SESSION['uid'])) {
    header("location:login.php");
}
else{
 $_SESSION['id']=$_GET['sub_cat_id'];
 header("location:sub_view.php");
}


?>