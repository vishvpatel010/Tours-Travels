<?php
include'connection.php';
$id=$_GET['id'];

if(isset($_REQUEST['submit']))
{
   $id=$_GET['id'];

  $file12=$_FILES['file']['name'];
    
        $allowed_file_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
      $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
   if (! in_array($file_extension, $allowed_file_extension)) 
   {
        $response = array(
            "type" => "error",
            $danger= "Upload valiid files. Only PNG and JPEG are allowed."
        );
    }    
    else if (($_FILES["file"]["size"] > 2000000)) 
    {
        $response = array(
            "type" => "error",
            $danger= "file size exceeds 2MB"
        );
    }    // Validate file file dimension
     else 
     {
        $target = "image/";

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target.$file12))
        {
            $response = array(
                "type" => "success",
                $success= "file uploaded successfully."
            );
    }
}


  $update=mysqli_query($conn,"update slider set image='$file12' where Id=$id");

  if($update)
  {
     header("location:slider_view.php");
  }
  
  else
  {
    echo "not updated";
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

                               
                                <div class="field-wrapper input">
                                    <label for="file"><h5>file</h5></label>
                                    
                                    <input type="file" name="file">
                                    
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Edit Your Info">
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
