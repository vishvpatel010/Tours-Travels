<?php 
include'header.php';
include'connection.php';
if(isset($_REQUEST['submit']))
{
        $cat_id=$_POST['cat_id'];
        $sub_cat_name=$_POST['sub_cat_name'];
        $sub_cat_content=$_POST['sub_cat_content']; 
        $sub_price=$_POST['sub_price'];
        $total_days=$_POST['total_days']; 
        $hotel_price=$_POST['hotel_price'];
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
        $target = "image/";

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target.$image))
        {
            $response = array(
                "type" => "success",
                $success= "Image uploaded successfully."
            );

             $insert=mysqli_query($conn,"insert into sub_cat (cat_id,sub_cat_name,sub_cat_content,image,total_days,sub_price) values ($cat_id,'$sub_cat_name','$sub_cat_content','$image',$total_days,$sub_price)");

            if($insert)
            {
                $last_id = mysqli_insert_id($conn);
                for ($i=0; $i<=$total_days; $i++) { 
                    $days_insert=mysqli_query($conn,"insert into listout (sub_id,days) values($last_id,$i); ");
                }
                if ($days_insert)
                {
                    header("location:sub_view.php");
                }
                
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
         x1= document.forms["sub"]["sub_cat_name"].value;
         x2= document.forms["sub"]["sub_cat_content"].value;
         x3= document.forms["sub"]["sub_price"].value;
         x5= document.forms["sub"]["hotel_price"].value;
         x4= document.forms["sub"]["total_days"].value;
         if(x1=="")
         {
             alert("sub cat name must be filled out");
             return false;
        }
        if(x2== "")
         {
             alert("sub cat content must be filled out");
             return false;
        }
          if(x3== "")
         {
             alert("Price must be filled out");
             return false;
        }
         if(x4== "")
         {
             alert("days must be filled out");
             return false;
        }
        if(x5== "")
         {
             alert("hotel price must be filled out");
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
                                            <h4>Sub Categories</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-content widget-content-area">
                                    <form method="post" enctype="multipart/form-data" action="" onsubmit="return subcat1()" name="sub" >
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Category Id</h5></label>
                                            <select class="form-control" id="exampleFormControlInput2" name="cat_id" >
                                                <?php include'connection.php';
                                                $sql=mysqli_query($conn,"select * from category");
                                                 while($row=mysqli_fetch_array($sql)){ ?>

                                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name']; ?></option>

                                            <?php } ?>

                                            </select> 
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Sub Categories Name</h5></label>
                                            <input type="text" class="form-control" id="exampleFormControlInput2" name="sub_cat_name" >
                                        </div>
                                         <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Total Days</h5></label>
                                            <input type="number" class="form-control" id="exampleFormControlInput2" name="total_days" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Sub Category Content</h5></label>
                                            <textarea rows=4 cols=10 class="form-control" id="exampleFormControlInput2" name="sub_cat_content">
                                            </textarea>
                                            <!-- <input type="text" class="form-control" id="exampleFormControlInput2" name="sub_cat_content" > -->
                                           
                                        </div>
                                        <div class="form-group mb-4 mt-3">
                                            <label for="exampleFormControlFile1"><h5>Image</h5></label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Price</h5></label>
                                            <input type="text" class="form-control" id="exampleFormControlInput2" name="sub_price" >
                                        </div>
                                         <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Hotel Price</h5></label>
                                            <input type="text" class="form-control" id="exampleFormControlInput2" name="hotel_price" >
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