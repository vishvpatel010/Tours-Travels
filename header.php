<?php
 include 'connection.php';
session_start();
$sql=mysqli_query($conn,"select *from category");
if (isset($_REQUEST['comment'])) {
     $id=$_SESSION['id'];
   $user_id=$_SESSION['uid']['User_Id'];
    $c_name=$_SESSION['uid']['UserName'];
    $email=$_SESSION['uid']['Email'];
    $comments=$_POST['comment'];
    $user_id=$_SESSION['uid']['User_Id'];
    $insert=mysqli_query($conn,"insert into comments (sub_id,User_Id,c_name,email,comments) values($id,$user_id,'$c_name','$email','$comments')");
    if($insert)
     {
        $s_comment="Comment Inserted Successfully...";
     }
      else
     {
      $n_comment="Comment Not Inserted.............";
     }
}
?>
<?php
if(isset($s_comment))
{
?>
<div class="alert alert-success"><?php echo $s_comment; ?> </div>
<?php } ?>

<?php
if(isset($n_comment))
{
?>
<div class="alert alert-danger"><?php echo $n_comment; ?></div>
<?php }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .dropdown-menu a:hover{
            background: #86B817;
        }
    </style>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="\tourist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="\tourist/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
  
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, Surat, Gujrat</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+91 9510462793</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>tourstravels47@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/ToursTravels9" target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100078862985422" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/in/tours-travels-779659234" target="_blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://instagram.com/_.tour_travels._?utm_medium=copy_link" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://youtube.com/channel/UC-W6z0wo6pA_Qc42E3_6iGw" target="_blank"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
               
                        <div class="dropdown-menu m-0">
                            <?php while($row=mysqli_fetch_array($sql)) {?>
                            <a href="sub_package.php?id=<?php echo $row['cat_id'] ?>" class="dropdown-item"><?php echo $row['cat_name'] ?> </a>
                            <?php } ?>
                        </div>
                        
                    </div>


                   
                    <a href="package.php" class="nav-item nav-link">Packages</a>
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                             <a href="cart1.php" class="dropdown-item">Cart</a>
                            <a href="checkout.php" class="dropdown-item">CheckOut</a>
                            <a href="menu.php" class="dropdown-item">Menu</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            <a href="faq.php" class="dropdown-item">FAQ</a>
                        </div>
                    </div>
                     <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <?php if (empty($_SESSION['uid'])) {?>
                <a href="login.php" class="btn btn-primary rounded-pill py-2 px-4">Login</a> <?php }?>
               <?php  if (!empty($_SESSION['uid'])) { ?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Hello,<?php echo $_SESSION['uid']['UserName']; ?></a>
                        <div class="dropdown-menu m-0">
                            <a href="profile.php" class="dropdown-item">Profile</a>
                            <a href="logout.php" class="dropdown-item">Logout</a>
                            <a href="changepassword.php" class="dropdown-item">Change Password</a>
                           </div>
                    </div>
                <?php } ?>
            </div>
        </nav>
           <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                       
                    </div>
                </div>
            </div>s
        </div>
    </div>
    <!-- Navbar & Hero End -->