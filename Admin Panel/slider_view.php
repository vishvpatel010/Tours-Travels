<?php

include'header.php';
include'connection.php';
$view=mysqli_query($conn,"select *from slider");
?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">                    
                        <div id="tableProgress" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Slider Table</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Id</th>
                                                    <th class="text-center">Slider title</th>
                                                    <th class="text-center">Slider description</th>
                                                    <th class="text-center">Price</th>
                                                     <th class="text-center">image</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                             <?php while($row=mysqli_fetch_array($view)) { ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['Id'];?></td>
                                                    <td class="text-center"><?php echo $row['Slider_Title'];?></td>
                                                    <td class="text-center"><?php echo $row['Slider_Description'];?></td>
                                                    <td class="text-center"><?php echo $row['price'];?></td>
                                                   <td><img src="image/<?php echo $row['image'] ?>" height=100 width=200></td>

                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="slider_update.php?id=<?php echo $row['Id']; ?>" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="slider_delete.php?id=<?php echo $row['Id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>

                                                        </ul>
                                                    </td>
                                                </tr>

                                                
                                            </tbody>
                                        <?php } ?>
                                        </table>
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