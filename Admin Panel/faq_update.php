<?php
include'connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"select *from faq where Faq_Id=$id");
$row=mysqli_fetch_array($sql);

if(isset($_REQUEST['submit']))
{
  $id=$_GET['id'];
  $Question=$_POST['Question'];
  $Answer=$_POST['Answer'];
  
  $update=mysqli_query($conn,"update faq set Question='$Question',Answer='$Answer' where Faq_Id=$id");

  if($update)
  {
    header("location:faq_view.php");
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
    <link rel="icon" type="file/x-icon" href="assets/img/favicon.ico"/>
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

                                <div  class="field-wrapper input">
                                    <label for="Slider_Title"><h5>Question</h5></label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="Question" name="Question" type="text" class="form-control"  value="<?php echo $row['Question']; ?>">
                                </div>
                                 
                                <div class="field-wrapper input">
                                    <label for="Slider_Description"><h5>Answer</h5></label>
                                    
                                    <textarea cols="5" rows="3" name="Answer" id="exampleFormControlInput2" class="form-control" value="Answer"><?php echo $row['Answer']; ?></textarea>
                                    
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Edit FAQ">
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