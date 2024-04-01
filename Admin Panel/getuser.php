<?php
$q = $_GET['q'];

include'connection.php';
if($q=="---"){
  $view = mysqli_query($conn,"select *from category");
}
else{
$view = mysqli_query($conn,"select *from category where cat_id = $q");
}
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>


<div class="widget-content widget-content-area" id="txtHint">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Category Id</th>
                                                    <th class="text-center">Category Name</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                             <?php while($sql=mysqli_fetch_array($view)) { ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><?php echo $sql['cat_id'];?></td>
                                                    <td class="text-center"><?php echo $sql['cat_name'];?></td>
                                                    <td class="text-center"><?php echo $sql['date'];?></td>

                                                    <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="cat_update.php?id=<?php echo $row['cat_id']; ?>" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="cat_delete.php?id=<?php echo $row['cat_id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>

                                                        </ul>
                                                    </td>
                                                </tr>

                                                
                                            </tbody>
                                        <?php } ?>
                                        </table>
                                    </div>

                                   
                                    </div>
</body>
</html>