<?php
include'connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"select *from menu where menu_id=$id");
$row=mysqli_fetch_array($sql);

if(isset($_REQUEST['submit']))
{
  $id=$_GET['id'];
  $menu_name=$_POST['menu_name'];
  $menu_content=$_POST['menu_content'];
  $menu_price=$_POST['menu_price'];
  $update=mysqli_query($conn,"update menu set menu_name='$menu_name',menu_content='$menu_content',menu_price='$menu_price' where menu_id=$id");

  if($update)
  {
    header("location:menu_view.php");
  }
  else
  {
    $danger="not updated.......";
  }
}
//include'header.php';
?>   

<?php
if(isset($danger))
{
?>
<div class="alert alert-danger"><?php echo $danger; ?></div>
<?php } ?>
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

                                <div id="name-field" class="field-wrapper input">
                                    <label for="menu_name"><h5>Name</h5></label>
                                    <input id="menu_name" name="menu_name" type="text" class="form-control" placeholder="name" value="<?php echo $row['menu_name']; ?>">
                                </div>

                                <div id="menu_content-field" class="field-wrapper input">
                                    <label for="menu_content"><h5>Content</h5></label>
                                    
                                    <textarea name="menu_content" value="" class="form-control" ><?php echo $row['menu_content']; ?></textarea>
                                </div>

                                <div id="menu_price-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="menu_price"><h5>Price</h5></label>
                                        
                                    </div>
                                   
                                    <input id="menu_price" name="menu_price" type="number" class="form-control" placeholder="price"  value="<?php echo $row['menu_price']; ?>">
                                    
                                </div>

                                

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" name="submit" value="">Edit Info...</button>
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