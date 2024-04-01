<?php

include'header.php';
include'connection.php';

$sql=mysqli_query($conn,"select *from contact_us");

if(isset($_GET['search']))
{
  $name=$_GET['searching'];
  $sel=mysqli_query($conn,"select * from contact_us where Name like '%$name%' ");
}
else
{
  $sel=mysqli_query($conn,"select * from  contact_us");
} 

if(isset($_GET['page']))
{
  $page=$_GET['page'];
}
else
{
  $page=1;
}

$per_page=3;
$start = ($page-1) * $per_page;
$sel=mysqli_query($conn,"select * from contact_us");
$num=mysqli_num_rows($sel);
$num1=ceil($num/$per_page);

$sql=mysqli_query($conn,"select * from contact_us");


if(isset($_GET['search']))
{
  $name=$_GET['searching'];
  $sql=mysqli_query($conn,"select * from contact_us where Name like '%$name%' limit $start,$per_page ");
}
else
{
  $sql=mysqli_query($conn,"select * from  contact_us limit $start,$per_page");
} 
?>


<?php
include_once'connection.php';
if(isset($_POST['submit']))
{
    $sql=mysqli_query($conn,"select *from contact_us");
        $check=$_POST['allcheck'];

        for($i=0 ; $i<sizeof($check) ; $i++)
        {
            $a1=$check[$i];
            $del=mysqli_query($conn,"delete from contact_us where Id=$a1"); 
        }
        if ($del) 
        {
        $sql=mysqli_query($conn,"select *from contact_us");
        }
}
?>

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

.page-item.active .page-link {
    background-color: #4361ee;
}
.page-link {
    margin-right: 5px;
    border-radius: 50%;
    padding: 8px 12px;
    background: rgba(0, 23, 55, 0.08);
    border: none;
    color: #888ea8;
}
</style>

<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
   <!--  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css"> -->
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">                    
                        <div id="tableProgress" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4> Contact US </h4>
                                             <form  class="form-inline search-full form-inline search" method="get">
                 <div class="search-bar">
                    <input type="text" name="searching" class="form-control float-left" placeholder="Search">
                     <input class="form-control float-right" bgcolor="black" type="submit" name="search" value="search">
                </div>
                    </form>
             </div>
        </div>
     </div>
                     <div class="widget-content widget-content-area">
                      <div class="table-responsive">
                        <form method="post">
             <table class="table table-bordered">
                  <thead>
                     <tr>
                    <th class="text-center"><input type="submit" name="submit" class="btn btn-danger" value="All Delete">&nbsp;
                        <input type="checkbox" name="check" id="checkAll">
                                                    
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Subject</th>
                    <!-- <th class="text-center" bgcolor="black">Password</th> -->
                    <th class="text-center">Message</th>
                    <th class="text-center">Action</th>
                </tr>
                            </thead>
            <?php while($row=mysqli_fetch_array($sql)) { ?>
                                            <tbody>
                                                <tr>
                     <td><input type="checkbox" name="allcheck[]" value="<?php echo $row["Id"] ?>"> </td>
                                                   
                                                    
                    <td class="text-center"><?php echo $row['Name'];?></td>
                    <td class="text-center"><?php echo $row['Email'];?></td>
                    <td class="text-center"><?php echo $row['Subject'];?></td>
                    <td class="text-center"><?php echo $row['Message'];?></td>
                    <td class="text-center">
                    <ul class="table-controls">
                    <li><a href="c_delete.php?id=<?php echo $row['Id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                    </ul>
                </td>

            </tr>

                                                
            </tbody>
        <?php } ?>
        <tr>
                                        <td colspan="8">
                                           <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center"><div class="dt--pages-count  mb-sm-0 mb-3"><div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Showing Page <?php echo $page; ?>  of <?php echo $num1; ?></div></div>

                                           

                                           <div class="dt--pagination"><div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate"><ul class="pagination"><li class="paginate_button page-item previous " id="zero-config_previous">
                                            <?php if($page>1) 
                                            {  ?>  
                                            <a href="contact_view.php?page=<?php echo ($page-1); ?> " aria-controls="zero-config" data-dt-idx="0" tabindex="0" class="page-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></a></li>
                                            <?php } ?>  
 <?php for($i=1 ; $i<=$num1 ; $i++) { 
                                               $class='';
                                                if($page==$i)
                                                {
                                                    $class='active';
                                                }
                                              ?>
                                             <li class="paginate_button page-item <?php echo $class ?>">
                                            <a href="contact_view.php?page=<?php 
                                            echo $i; ?>" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link" value="<?php echo $i; ?>"> <?php echo $i; ?></a></li>

   <?php } ?>                                            
                                            <?php if($page<$num1) 
                                            {  ?>

                                            <li class="paginate_button page-item next" id="zero-config_next"><a href="contact_view.php?page=<?php echo ($page+1); ?> " aria-controls="zero-config" data-dt-idx="5" tabindex="0" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a></li>
                                        <?php } ?>

                                        </ul></div></div></div>
                                        
                                        

                                        </td>
                                      </tr>
        </table>
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

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <script type="text/javascript">

  $("#checkAll").click(function()
  {
    $('input:checkbox').not(this).prop('checked', this.checked);
}
);

</script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 03:08:24 GMT -->
</html>