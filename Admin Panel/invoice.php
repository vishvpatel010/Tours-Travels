<?php 
session_start();
if(isset($_SESSION['uid2']))
{
include'connection.php';

$date= date("Y/m/d");

if(isset($_POST['date']))
{
    $date=$_POST['date'];
}

$view=$conn->query("select *from payment pay,cart where pay.user_id=cart.user_id and DATE(pay.date)='$date'");
//$view=$conn->query("select *from payment where payment_id=39");
//$row=mysqli_fetch_array($view);

//$user_id=$_SESSION['uid']['User_Id'];
//$sel=$conn->query("select *from cart");

$sub_total=0;
}
else
{
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo3/apps_invoice-preview.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:07:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Invoice| Tourist  </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/apps/invoice-preview.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
    
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content" style="margin-top: 20px;">
            <div class="layout-px-spacing">
                <div class="row invoice layout-top-spacing layout-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">

                            <div class="row">
<form method="post">

                                                                         <p class="inv-created-date"><span class="inv-title">Select Date : </span> <span class="inv-date">
                                                                    <input type="date" name="date" >
                                                                    
                                                                    <input type="submit" name="submit" style="margin-bottom: 20px;">
                                                                </form>
                                <div class="col-xl-9">

                                    <div class="invoice-container">
                                        <div class="invoice-inbox">
                                            
                                            <div id="ct" class="">
                                                
                                                <div class="invoice-00001">
                                                    <div class="content-section">
    
                                                        <div class="inv--head-section inv--detail-section">
                                                        
                                                            <div class="row">
                                                            
                                                                <div class="col-sm-6 col-12 mr-auto">
                                                                    <div class="d-flex">
                                                                    <i class="fa fa-map-marker-alt me-2"></i>
                                                                        <h3 class="in-heading align-self-center">Tourist</h3>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6 text-sm-right">
                                                                        
                                                                </div>

                                                                <div class="col-sm-6 align-self-center mt-3">
                                                                    <p class="inv-street-addr">123 Street, Surat, Gujrat</p>
                                                                    <p class="inv-email-address">tourstravels47@gmail.com</p>
                                                                    <p class="inv-email-address">+91 95104 62793</p>
                                                                </div>
                                                                <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                                    
                                                                    <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date"><?php echo date("d/m/Y") ?></span></p>
                                                                    <p class="inv-created-date"><span class="inv-title">Record Date : </span> <span class="inv-date">
<?php
$date=date_create($date);
echo date_format($date,"d/m/Y");
?></span></p>
                                                                </div>
                                                            
                                                            </div>
                                                            
                                                        </div>
    
                                                       

                                                        <div class="inv--product-table-section">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead class="">
                                                                        <tr>
                                                                            <th scope="col">Payment ID</th>
                                                                            <th scope="col">User Id</th>
                                                                           <!--  <th scope="col">Order Id</th> -->
                                                                           <!--  <th class="text-right" scope="col">Person</th> -->
                                                                           <th class="text-right" scope="col">Package Name</th>
                                                                           <!-- <th class="text-right" scope="col">Date</th> -->
                                                                            <th class="text-right" scope="col">Person</th>
                                                                            <th class="text-right" scope="col">Days</th>
                                                                            
                                                                             <th class="text-right" scope="col">Package Price</th>
                                                                            <th class="text-right" scope="col">Amount</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                             <?php while($row=mysqli_fetch_array($view)) { ?>
                                                                                <tr>
                                                                                    <td><?=$row['payment_id'] ?></td>
                                                                            <td><?=$row['user_id']; ?></td>
                                                                                <td class="text-right"><?=$row['package_name']; ?></td>
                                                                                <!-- <td class="text-right"><?//=$row['date']; ?></td> -->
                                                                                 <td ><?=$row['person']; ?></td>
                                                                            <td ><?=$row['days']; ?></td>
                                                                            <td ><?=$row['sub_price']; ?></td>
                                                                             <td ><?=$row['total']; ?></td>
                                                                             </tr>
                                                                        <?php
                                                                             $sub_total+=$row['total'];
                                                                            } ?>
                                                                            
                                                                        
                                                                       
                                                                     
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="inv--total-amounts">
                                                        
                                                            <div class="row mt-4">
                                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                                </div>
                                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                                    <div class="text-sm-right">
                                                                        <div class="row">
                                                                            <div class="col-sm-8 col-7">
                                                                                <p class="">Sub Total: </p>
                                                                            </div>
                                                                            <div class="col-sm-4 col-5">
                                                                                <p class=""><?=$sub_total ?></p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                <div class="inv--note d-flex justify-content-end">

                                                            <div class="row mt-4">
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>

                            </div>
                            
                            
                        </div>

                    </div>
                </div>
                                                        
    
                                                    </div>


                                            </div>
    
    
                                        </div>
    
                                    </div>

                                </div>

                
                <div class="inv--note d-flex justify-content-end">

                                                            <div class="row mt-2">
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="index.php" class="btn btn-secondary ">Go back</a>

                            </div>
                            
                            
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
    <script src="assets/js/app.js"></script>
    
    <!-- <script>
        $(document).ready(function() {
            App.init();
        });
    </script> -->
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/apps/invoice-preview.js"></script>
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/apps_invoice-preview.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:07:41 GMT -->
</html>