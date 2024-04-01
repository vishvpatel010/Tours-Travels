<?php
include'connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"select *from category where cat_id=$id");
$row=mysqli_fetch_array($sql);

if(isset($_REQUEST['submit']))
{
  $id=$_GET['id'];
  $cat_name=$_POST['cat_name'];
  $update=mysqli_query($conn,"update category set cat_name='$cat_name' where cat_id=$id");

  if($update)
  {
    header("location:cat_view.php");
  }
  else
  {
    echo "not updated.............";
  }
}
//include'header.php';
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

                        <h1 class="">category Update</h1>
                        
                        <form class="text-left"  method="post">
                            <div class="form">

                                <div  class="field-wrapper input">
                                    <label for="cat_name">category name</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="cat_name" name="cat_name" type="text" class="form-control"  value="<?php echo $row['cat_name']; ?>">
                                </div>

                               

                               
                                

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" name="submit" value="">Edit the category Info...</button>
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