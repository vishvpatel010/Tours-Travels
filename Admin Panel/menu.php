<?php
$q = $_GET['q'];
include'connection.php';
$select=mysqli_query($conn,"select *from sub_cat where cat_id=$q");

?>
<!DOCTYPE html>
<html>
<body>

										<div class="form-group mb-4">
                                            <label for="exampleFormControlInput2"><h5>
                                            Sub Category Name</h5></label>
                                            <select class="form-control" id="exampleFormControlInput2" name="sub_cat_id" >
                                                <?php 
                                                 while($row=mysqli_fetch_array($select)){ ?>

                                                <option value="<?php echo $row['sub_cat_id'];?>"><?php echo $row['sub_cat_name']; ?></option>

                                            <?php } ?>

                                            </select> 
                                        </div>

</body>
</html>