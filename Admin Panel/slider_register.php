<?php
include'connection.php';
  include'header.php';


if(isset($_REQUEST['submit']))
{
        $Slider_Title=$_POST['Slider_Title'];
        $Slider_Description=$_POST['Slider_Description'];  
        $price=$_POST['price'];
        $image=$_FILES['image']['name'];

        //$fileinfo = @getimagesize($_FILES["file["tmp_name"]);
    
        $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
      $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
       //$file_extension=rand(100,10000)."-".$_FILES['image']['name'];
    
    // Validate file input to check if is not empty
   if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            $danger= "Upload valiid images. Only PNG and JPEG are allowed."
        );
    }    // Validate image file size
    else if (($_FILES["image"]["size"] > 200000000)) {
        $response = array(
            "type" => "error",
            $danger= "Image size exceeds 2MB"
        );
    }    // Validate image file dimension
     else {
        $target = "../image/slider/";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target.$image))
        {
            $response = array(
                "type" => "success",
                $success= "Image uploaded successfully."
            );

             $insert=mysqli_query($conn,"insert into slider (Slider_Title,Slider_Description,price,image) values ('$Slider_Title','$Slider_Description',$price,'$image')");

            if($insert)
            {
               $success= "insert Successfully...!!";
            }
            else
            {
               $danger= "not inserted record";
            }
        }
    }

    }
?>
?>
<script>
        function validateForm()
        {
         x1= document.forms["slider"]["Slider_Title"].value;
         x2= document.forms["slider"]["Slider_Description"].value;
         x3= document.forms["slider"]["price"].value;
         x4= document.forms["slider"]["image"].value;
         if(x1== "")
         {
             alert("Title must be filled out");
             return false;
        }
        if(x2== "")
         {
             alert("Describe must be filled out");
             return false;
        }
        if(x3== "")
         {
             alert("insert the valid price");
             return false;
        }
        if(x4== "")
         {
             alert("select the images");
             return false;
        }
        }
</script>


        <div id="content" class="main-content">
            <div class="container">

                <div class="container">

                    <div id="navSection" data-spy="affix" class="nav  sidenav">
                    
                    </div>
  <?php
    if(isset($success))
{
?>
<div class="alert alert-success"><?php echo $success; ?> </div>
<?php } ?>

<?php
if(isset($danger))
{
?>
<div class="alert alert-danger"><?php echo $danger; ?></div>
<?php } ?>

                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Slider Register</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" enctype="multipart/form-data" action="" onsubmit="return validateForm()" name="slider">
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Slider title</h5></label>
                                            <input type="text" class="form-control" id="exampleFormControlInput2" name="Slider_Title" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Slider Description</h5></label>
                                            <textarea cols="5" rows="3" name="Slider_Description" id="exampleFormControlInput2" class="form-control" value="Slider_Description"></textarea>
                                        </div>
                                         <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Price</h5></label>
                                            <input type="number" class="form-control" id="exampleFormControlInput2" name="price" >
                                        </div>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1"><h5>Image</h5></label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                        </div>
                                        <input type="submit" name="submit" value="submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    
          
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/form_bootstrap_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:08:31 GMT -->
</html>