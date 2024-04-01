<?php
    //include 'header.php';
  include 'connection.php';
    session_start();
    $space="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    $user_id=$_SESSION['uid']['User_Id'];
    $sql=mysqli_query($conn,"select *from user_register where User_Id=$user_id");
    
    if (isset($_REQUEST['sub'])) 
    {
      $user_id=$_SESSION['uid']['User_Id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
      $UserName=$_POST['UserName'];
      $Email=$_POST['Email'];
      $Number=$_POST['Number'];

        $new_image=$_FILES['new_image']['name'];
        $old_image=$_POST['old_image'];

        $target="Admin Panel/user_profile/";

        if($new_image != '')
        {
            $up_image= $new_image;
        }
        else
        {
            $up_image= $old_image;
        }

        if(file_exists("Admin Panel/user_profile/".$new_image))
        {
            $danger= "File already exist";
        }
        else
        {
            $up=mysqli_query($conn,"update user_register set fname='$fname',lname='$lname',UserName='$UserName',Email='$Email',Number='$Number',image='$up_image' where User_Id=$user_id ");  
            
            if($up)
            {
                if($new_image != '')
                {
                    move_uploaded_file($_FILES['new_image']['tmp_name'], $target.$new_image);
                    unlink($target.$old_image);  
                }
            } 
            else
            {
                $danger="Not updated";
            }
        }
    }

?>                          
   


    
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile </title>


    <!-- Font Icon -->
    <link rel="stylesheet" href="css1/icons_profile.css">
    

    <!-- Main css -->
    <link rel="stylesheet" href="css1/style.css">
    
<script>
function goBack() {
window.history.back();
}
</script>
<script> 
    function validateform()
{  
    var name=document.myform.name.value;
    var email=document.myform.email.value;
    var password=document.myform.pass.value; 
    var phone=document.myform.phone.value;
    var address=document.myform.address.value; 
  
    if (name==null || name=="")
    {  
            alert("Please Enter Your Name");  
            return false;  
    }

   else if (name==null || email==/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(myform.email.value))
    {  
            alert("Please Enter Your Email");  
            return false;  
    }
    else if(name==null || password=="")
    {  
            alert("Please Enter Your Password.");  
            return false;  
    }  

    else if(name==null || password.length<8)
    {  
            alert("Password Must Be Atleast 8 Characters Long.");  
            return false;  
    } 
    else if(name==null || password.length>12)
    {  
            alert("Password length between 8 and 12  Characters .");  
            return false;  
    }
    else if(name==null || phone=="")
    {  
            alert("Please Enter Your phone number.");  
            return false;  
    }  
    else if(name==null || phone.length<10)
    {  
            alert("Phone number Must Be Atleast 10 Characters Long.");  
            return false;  
    } 
    else if(name==null || phone.length>10)
    {  
            alert("Phone number Must Be Atleast 10 Characters Long.");  
            return false;  
    } 

    else if(name==null || address=="")
    {  
            alert("Please Enter Your Address.");  
            return false;  
    }  
}
</script>

</head>
<body>
      <?php $row=mysqli_fetch_array($sql); ?>
    
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
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
                        <h2 class="form-title">Profile</h2>
                        <form method="POST" class="register-form"  id="register-form" onsubmit="return validateform()" name="myform" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               
                            </div>
                          
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name">First Name</i></label>
                                <br><br><input type="text" name="fname" id="UserName" value="<?php echo $row['fname']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name">Last Name</i></label><br><br>
                                <input type="text" name="lname" id="UserName" value="<?php echo $row['lname']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="UserName"><i class="zmdi zmdi-account material-icons-name">UserName</i></label><br><br>
                                <input type="text" name="UserName" id="UserName" value="<?php echo $row['UserName']; ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="Email"><i class="zmdi zmdi-email">Email</i></label><br><br>
                                <input type="email" name="Email" id="Email" value="<?php echo $row['Email']; ?>"/>
                            </div>
                            
                             <div class="form-group">
                                <label for="Number"><i class="zmdi zmdi-phone">Number</i></label><br><br>
                                <input type="text" name="Number" id="Number" value="<?php echo $row['Number']; ?>"/>
                            </div>
                            <div class="form-group">
                                 <label for="Number"><i class="zmdi zmdi-phone">Image</i></label><br><br>
                                 <figure><img src="Admin Panel/user_profile/<?=$row['image'] ?>" alt="sing up image"></figure>
                                 <input type="file" name="new_image">
                                 <input type="hidden" name="old_image" value="<?=$row['image']?>">
                         </div>


                            <!--<div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>-->
                            <div class="form-group form-button">
                                <input type="submit" name="sub" id="signup" class="form-submit" value="UPDATE"/> 
                               <a href="#" class="form-submit" onclick="goBack();" style="text-decoration: none;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspv&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $space; ?>GO BACK</a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>
        <style type="text/css">
            .alert{
                padding:8px;
                border-radius: 8px;
            }

            .alert-success{
                color:#fff;
                background-color:#56c827;
            }
            .alert-danger {
                color: #fff;
                background-color:#ec1e19;
            }
            .form-submit
             {
                width :100%;
             }

        </style>
         <script src="ADMIN PANEL/vendor/jquery/jquery.min.js"></script>
    <script src="ADMIN PANEL/js/main.js"></script>
    </body>

     <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>