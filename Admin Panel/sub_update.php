<?php
include'connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"select *from sub_cat where sub_cat_id=$id");
$row=mysqli_fetch_array($sql);

if(isset($_REQUEST['submit']))
{
  $id=$_GET['id'];
  $sub_cat_name=$_POST['sub_cat_name'];
  $sub_cat_content=$_POST['sub_cat_content'];
  $total_days=$_POST['days'];
  $sub_price=$_POST['sub_price'];
  $room_id=$_POST['room_id'];
  $hotel=mysqli_fetch_array(mysqli_query($conn,"select *from rooms where room_id=$room_id"));
  $hotel_price=$hotel['price'];
  $update=mysqli_query($conn,"update sub_cat set sub_cat_name='$sub_cat_name',sub_cat_content='$sub_cat_content',sub_price=$sub_price,total_days=$total_days,hotel_price=$hotel_price,room_id=$room_id where sub_cat_id=$id");

  if($update)
  {

     $last_id = $_GET['id'];
     $num=mysqli_num_rows(mysqli_query($conn,"select *from listout where sub_id=$last_id"));
     if ($num==0) {
         
                for ($i=1; $i<=$total_days; $i++) { 
                    $days_insert=mysqli_query($conn,"insert into listout (sub_id,days) values($last_id,$i); ");
                }
            }
            else{

               header("location:sub_view.php");
            }
  }
  else
  {
    echo "not updated.............";
  }
}
?>   
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo3/auth_register_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:08:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Register Boxed | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<body class="form">
    <center>

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Update</h1>
                        
                        <form class="text-left"  method="post">
                            <div class="form">

                                <div id="sub_cat_name-field" class="field-wrapper input">
                                    <label for="sub_cat_name">Sub Cat Name</label>
                                    <input id="sub_cat_name" name="sub_cat_name" type="text" class="form-control" placeholder="Username" value="<?php echo $row['sub_cat_name']; ?>">
                                </div>
                                <div id="sub_cat_name-field" class="field-wrapper input">
                                    <label for="sub_cat_name">Days</label>
                                    <input id="sub_cat_name" name="days" type="number" class="form-control" placeholder="days" value="<?php echo $row['total_days']; ?>">
                                </div>

                                <div id="sub_cat_content-field" class="field-wrapper input">
                                    <label for="sub_cat_content">Content</label>
                                    <input id="sub_cat_content" name="sub_cat_content" type="text" class="form-control" placeholder="sub cat content" value="<?php echo $row['sub_cat_content']; ?>">
                                </div>
                                 <div id="sub_price-field" class="field-wrapper input">
                                    <label for="sub_price">Package Price</label>
                                    <input id="sub_price" name="sub_price" type="text" class="form-control" placeholder="sub cat content" value="<?php echo $row['sub_price']; ?>">
                                </div>
                                <?php 
                                    $select=mysqli_query($conn,"select *from rooms");
                                 ?>
                                <div id="hotel_price-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="room_id">HOTEL ROOM</label>
                                    </div>
                                    <select  class="form-control" id="room_id" name="room_id">
                                        <?php while ($sele=mysqli_fetch_array($select)) {?>
                                        <option class="form-control" value="<?php echo $sele['room_id']; ?>"><?php echo $sele['type']; ?>---<?php echo $sele['price']; ?></option>
                                    <?php } ?>
                                    </select>
                                    
                                </div>

                                

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" name="submit" value="">Edit Your Info...</button>
                                    </div>
                                </div>


                                
                                </div>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>
</center>

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/auth_register_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:08:53 GMT -->
</html>