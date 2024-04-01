 <?php 
  include'header.php';
  include'connection.php';
if(isset($_REQUEST['submit']))
{ 
        $Question=$_POST['Question'];
        $Answer=$_POST['Answer'];  
             $insert=mysqli_query($conn,"insert into faq(Question,Answer) values ('$Question','$Answer')");
            if($insert)
            { ?>
              <!--   header("location:faq_view.php"); -->
              <script type="text/javascript">
                  window.location.href="faq_view.php";
              </script>
            <?php }
            else
            {
               $danger= "not inserted record";
            }
    }
?>
  <script>
        function validateForm()
        {
         x1= document.forms["faqregister"]["Question"].value;
         x2= document.forms["faqregister"]["Answer"].value;
         if(x1== "")
         {
             alert("Question must be filled out");
             return false;
        }
        if(x2== "")
         {
             alert("Answer must be filled out");
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
                                            <h4>FAQ Register</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" enctype="multipart/form-data" action="" onsubmit="return validateForm()" name="faqregister">
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Question</h5></label>
                                            <input type="text" class="form-control" id="exampleFormControlInput2" name="Question" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>Answer</h5></label>
                                            <textarea cols="5" rows="3" name="Answer" id="exampleFormControlInput2" class="form-control"></textarea>
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