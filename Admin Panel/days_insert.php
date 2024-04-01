<?php 
include'header.php';
include'connection.php';
$sub_id=$_SESSION['sub_cat_id'];
$description=null;
$sql1=mysqli_query($conn,"select * from listout where sub_id=$sub_id and description='$description' ");

if(isset($_REQUEST['submit']))
{
      
        $description=$_POST['description']; 
        $lo_id=$_POST['lo_id'];
        $image=$_FILES['image']['name'];

        $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
      $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
       
    
   
   if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            $danger= "Upload valiid images. Only PNG and JPEG are allowed."
        );
    }    
    else if (($_FILES["image"]["size"] > 200000000000)) {
        $response = array(
            "type" => "error",
            $danger= "Image size exceeds 2MB"
        );
    }   
     else {
        $target = "days_image/";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target.$image))
        {
            $response = array(
                "type" => "success",
                $success= "Image uploaded successfully."
            );

             $insert=mysqli_query($conn,"update listout set description='$description',list_image='$image' where lo_id=$lo_id");

            if($insert)
            {
              $success="insert Successfully.......";
                
            }
            else
            {
               $danger= "not inserted record";
            }
        }
    }
    }   
?>
<script>
        function subcat1()
        {
         x2= document.forms["sub"]["description"].value;
        
        if(x2== "")
         {
             alert("description must be filled out");
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
                                            <h4>Sub Categories days</h4>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>sub category name:-
                                                <?php 
                                                $id=$_SESSION['sub_cat_id'];
                                                    $rew=mysqli_query($conn,"select *from sub_cat where sub_cat_id=$id");
                                                    $select=mysqli_fetch_array($rew);
                                                    echo $select['sub_cat_name'];
                                                 ?>
                                                     
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-content widget-content-area">
                                    <form method="post" enctype="multipart/form-data" action="" onsubmit="return subcat1()" name="sub" >
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Day</h5></label>
                                            <select class="form-control" id="exampleFormControlInput2" name="lo_id" >
                                                <?php 
                                                 while($row1=mysqli_fetch_array($sql1)){ ?>

                                                <option value="<?php echo $row1['lo_id'];?>"><?php echo $row1['days']; ?></option>

                                            <?php } ?>

                                            </select> 
                                        </div>
                                       
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>description</h5></label>
                                            <textarea rows=4 cols=10 class="form-control" id="exampleFormControlInput2" name="description">
                                            </textarea>
                                            <!-- <input type="text" class="form-control" id="exampleFormControlInput2" name="sub_cat_content" > -->
                                           
                                        </div>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1"><h5>Image</h5></label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                        </div>
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