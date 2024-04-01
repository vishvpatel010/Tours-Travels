<?php

include 'connection.php';
include'header.php';
$count=0;
$sql=mysqli_query($conn,"select * from sub_cat");
$count=mysqli_num_rows($sql);

$count1=0;
$sql1=mysqli_query($conn,"select * from user_register");
$count1=mysqli_num_rows($sql1);

$count2=0;
$sql2=mysqli_query($conn,"select * from comments");
$count2=mysqli_num_rows($sql2);

$count3=0;
$sql3=mysqli_query($conn,"select * from orders");
$count3=mysqli_num_rows($sql3);

$count4=0;
$sql4=mysqli_query($conn,"select * from faq");
$count4=mysqli_num_rows($sql4);

 $count5=0;
$sql5=mysqli_query($conn,"select * from menu");
$count5=mysqli_num_rows($sql5);

$count6=0;
$sql6=mysqli_query($conn,"select * from contact_us");
$count6=mysqli_num_rows($sql6);

 $count7=0;
// $sql7=mysqli_query($conn,"select * from services");
// $count7=mysqli_num_rows($sql7);

$count8=0;
$sql8=mysqli_query($conn,"select * from category");
$count8=mysqli_num_rows($sql8);

$count9=0;
 $sql9=mysqli_query($conn,"select * from admin_register");
 $count9=mysqli_num_rows($sql9);


?>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
 <div id="content" class="main-content">
     <div class="header"> 
                         
                <h1 class="page-header mb-5" >&nbsp;&nbsp;<center>Dashboard</center> </h1>
                               
        </div>       
         <div id="page-inner">       
               
        <div class="row">
            
        </div>
  
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">

          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count1; ?></h3>
                <small>Users</small>
              </h3> 
            </div>
            <div class="icon">
               <i class="fa fa-eye fa-5x red"></i>
            </div>
     
                        </div>
            </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">

          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count8; ?></h3>
                <small>category</small>
              </h3> 
            </div>
            <div class="icon">
               <i class="fa fa-list-alt" aria-hidden="true"></i>
            </div>
     
                        </div>
            </div>
                    </div>
          
                 <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
            
                
              
              
              <h3>
                <h3><?php echo $count; ?></h3>
                <small>Packages</small>
              </h3> 
          
            </div>
            <div class="icon">
               <i class="fa fa-shopping-cart fa-5x blue"></i>
            </div>
     
                        </div>
            </div>
                    </div>
          
                 <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count2; ?></h3>
                <small>Comments</small>
              </h3> 
            </div>
            <div class="icon">
               <i class="fa fa-comments fa-5x green"></i>
            </div>
     
                        </div>
            </div>
                    </div>

                     <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count9; ?></h3>
                <small>Admins</small>
              </h3> 
            </div>
            <div class="icon">
              <i class="fa fa-user red" aria-hidden="true"></i>
            </div>
     
                        </div>
            </div>
                    </div>
          
                 <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count3; ?></h3>
                <small>Daily Orders</small>
              </h3> 
            </div>
            <div class="icon">
              <i class="fa fa-first-order yellow" aria-hidden="true"></i>
            </div>
     
                        </div>
            </div>
                    </div>

                     <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count4; ?></h3>
                <small>Frequently Ask Questions</small>
              </h3> 
            </div>
            <div class="icon">
               <i class="fa fa-question-circle yellow" aria-hidden="true"></i>
            </div>
     
                        </div>
            </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count5; ?></h3>
                <small>menu</small>
              </h3> 
            </div>
            <div class="icon">
              <i class="fa fa-book green" aria-hidden="true"></i>
            </div>
     
                        </div>
            </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count6; ?></h3>
                <small>contact us</small>
              </h3> 
            </div>
            <div class="icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
     
                        </div>
            </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="board">
                        <div class="panel panel-primary">
            <div class="number">
              <h3>
                <h3><?php echo $count7; ?></h3>
                <small>services</small>
              </h3> 
            </div>
            <div class="icon">
               <i class="fa fa-gift red" aria-hidden="true"></i>
            </div>
     
                        </div>
            </div>
                    </div>

                   
           
                </div>
             <div class="row">
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                
                                    <meta name="viewport" content="width=device-width, initial-scale=1" >
                                          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                          <style>
                                          body {
                                            font-family: Arial;
                                          }

                                          * {
                                            box-sizing: border-box;
                                          }

                                          form.example input[type=text] {
                                            padding: 10px;
                                            font-size: 17px;
                                            border: 1px solid grey;
                                            float: left;
                                            width: 80%;
                                            background: #f1f1f1;
                                          }

                                          form.example button {
                                            float: left;
                                            width: 20%;
                                            padding: 10px;
                                            background: #f36a5a;
                                            color: white;
                                            font-size: 17px;
                                            border: 1px solid grey;
                                            border-left: none;
                                            cursor: pointer;
                                          }

                                          form.example button:hover {
                                            background: #0b7dda;
                                          }

                                          form.example::after {
                                            content: "";
                                            clear: both;
                                            display: table;
                                          }
                                          </style>
                                          </head>
                                          <body>
                                   
                                </div>
                               
                            </div>
                        </div>
                       
                   
      
    
         
          
            
          
        
       
        
        
               
        

     
        
        
        

                <!-- /. ROW  -->
      
    
        
        
        
        
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

            </div>
           <!--  <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2022 <a target="_blank" href="index.php">Tourist</a>, All rights reserved.</p>
                </div>

            </div> -->
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

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
   
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:08:24 GMT -->
</html>