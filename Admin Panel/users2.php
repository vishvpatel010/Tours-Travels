<?php 

include'header.php';
include'connection.php';

$sql=mysqli_query($conn,"select *from user_register");

if(isset($_GET['search']))
{
  $name=$_GET['searching'];
  $sql=mysqli_query($conn,"select * from user_register where name like '%$name%' ");
}
else
{
  $sql=mysqli_query($conn,"select * from  user_register");
} 

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->
    <style type="text/css">
       div.dataTables_info {
    padding-top: 0.85em;
    white-space: normal;
    color: #61b6cd;
    font-weight: 600;
    border: 1px solid #1b2e4b;
    display: inline-block;
    padding: 10px 16px;
    border-radius: 6px;
    font-size: 13px;
}

/*#result{
    font-size: 13px;
    margin-bottom: 0;
    font-weight: normal;
    text-align: left;
    white-space: nowrap;
    color: #888ea8;
    font-weight: 600;
    font-size: 15px;
    color: #e3e4eb;
    letter-spacing: 1px;
    display: inline-block;
    margin-bottom: 0.5rem;
}*/
   

    </style>
</head>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <label id="result">Results :  <select name="zero-config_length" aria-controls="zero-config" class="form-control"><option value="7">7</option><option value="10">10</option><option value="20">20</option><option value="50">50</option></select></label>
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Password</th>
                                        <th>Gender</th>
                                        <th class="no-content">Actions</th>
                                    </tr>
                                </thead>
        <?php while($row=mysqli_fetch_array($sql)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['Name'];?></td>
                                        <td><?php echo $row['UserName'];?></td>
                                        <td><?php echo $row['Email'];?></td>
                                         <td><?php echo $row['Number'];?></td>
                                        <td><?php echo $row['Password'];?></td>
                                        <td><?php echo $row['Gender'];?></td>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                             <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center"><div class="dt--pages-count  mb-sm-0 mb-3"><div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Showing page 1 of 4</div></div><div class="dt--pagination"><div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero-config_previous"><a href="#" aria-controls="zero-config" data-dt-idx="0" tabindex="0" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-config" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-config" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-config" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next" id="zero-config_next"><a href="#" aria-controls="zero-config" data-dt-idx="5" tabindex="0" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a></li></ul></div></div></div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
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
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

   
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/table_dt_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:08:24 GMT -->
</html>