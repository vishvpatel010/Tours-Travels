<?php
    include 'header.php';
    if (empty($_SESSION['uid'])) {
      ?>
      <script type="text/javascript">
     window.location.href = "login.php";
     </script>
     <?php
    }
    $user_id=$_SESSION['uid']['User_Id'];
    $sql=mysqli_query($conn,"select *from cart where user_id=$user_id");
?>                          
   
<style type="text/css">
    /* Cart Page Area css
============================================================================================ */
.cart_table_area .table-responsive .table {
  border: 1px solid #ebebeb;
  margin-bottom: 50px;
}

.cart_table_area .table-responsive .table thead {
  background: #f9f9f9;
}

.cart_table_area .table-responsive .table thead tr th {
  border: 1px solid #ebebeb;
  line-height: 56px;
  padding: 0px;
  color: #3e606b;
  font-family: "Playfair Display", serif;
  font-weight: bold;
  font-size: 20px;
}

.cart_table_area .table-responsive .table thead tr th:first-child {
  width: 246px;
  padding: 0px 35px;
}

.cart_table_area .table-responsive .table thead tr th:nth-child(2) {
  width: 214px;
  padding: 0px 20px;
}

.cart_table_area .table-responsive .table thead tr th:nth-child(3) {
  width: 145px;
  padding: 0px 20px;
}

.cart_table_area .table-responsive .table thead tr th:nth-child(4) {
  width: 230px;
  padding: 0px 20px;
}

.cart_table_area .table-responsive .table thead tr th:nth-child(5) {
  width: 196px;
  padding: 0px 20px;
}

.cart_table_area .table-responsive .table tbody tr {
  border-bottom: 1px solid #ebebeb;
}

.cart_table_area .table-responsive .table tbody tr td {
  padding: 25px 25px;
  border-right: 1px solid #ff0000;
  vertical-align: middle;
  -ms-flex-item-align: center;
  align-self: center;
  font-size: 16px;
  font-family: "Open Sans", sans-serif;
  color: #797979;
}

.cart_table_area .table-responsive .table tbody tr td .product_select {
  width: 96px;
  border-radius: 0px;
  padding: 0px;
  height: 42px;
  border: 1px solid #ebebeb;
  text-align: center;
  padding-left: 22px;
}

.cart_table_area .table-responsive .table tbody tr td .product_select:after {
  content: "\f0d7";
  font: normal normal normal 14px/1 FontAwesome;
  border: none;
  -webkit-transform: rotate(0);
  -ms-transform: rotate(0);
  transform: rotate(0);
  margin-top: -7px;
  right: 16px;
}

.cart_table_area .table-responsive .table tbody tr td .product_select:before {
  content: "";
  height: 100%;
  width: 1px;
  background: #ebebeb;
  right: 36px;
  position: absolute;
  top: 0px;
}

.cart_table_area .table-responsive .table tbody tr td:first-child {
  text-align: center;
}

.cart_table_area .table-responsive .table tbody tr td:nth-child(5) {
  font-size: 17px;
  font-weight: 600;
}

.cart_table_area .table-responsive .table tbody tr td:last-child {
  text-align: center;
  color: #242424;
  font-size: 18px;
}

.cart_table_area .table-responsive .table tbody tr:last-child {
  background: #f9f9f9;
}

.cart_table_area .table-responsive .table tbody tr:last-child td {
  border: none;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .form-inline {
  margin-right: -120px;
  padding-left: 20px;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .form-inline .form-group input {
  width: 130px;
  border: 1px solid #dddddd;
  border-radius: 3px;
  height: 33px;
  font-size: 15px;
  font-family: "Open Sans", sans-serif;
  color: #8e8d8d;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .form-inline .form-group input.placeholder {
  font-size: 15px;
  font-family: "Open Sans", sans-serif;
  color: #8e8d8d;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .form-inline .form-group input:-moz-placeholder {
  font-size: 15px;
  font-family: "Open Sans", sans-serif;
  color: #8e8d8d;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .form-inline .form-group input::-moz-placeholder {
  font-size: 15px;
  font-family: "Open Sans", sans-serif;
  color: #8e8d8d;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .form-inline .form-group input::-webkit-input-placeholder {
  font-size: 15px;
  font-family: "Open Sans", sans-serif;
  color: #8e8d8d;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .form-inline .btn {
  width: 140px;
  border-radius: 3px;
  background: #242424;
  color: #fff;
  height: 31px;
  line-height: 26px;
  padding: 0px;
  margin-left: 17px;
  border: none;
  outline: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
}

.cart_table_area .table-responsive .table tbody tr:last-child td .pest_btn {
  margin-left: -80px;
  margin-right: 15px;
  line-height: 42px;
  padding: 0px 30px;
}

.cart_total_inner .cart_total_text {
  border: 1px solid #ebebeb;
}

.cart_total_inner .cart_total_text .cart_head {
  background: #f9f9f9;
  font-family: "Playfair Display", serif;
  font-weight: bold;
  color: #3e606b;
  line-height: 56px;
  padding: 0px 24px;
  border-bottom: 1px solid #ebebeb;
}

.cart_total_inner .cart_total_text .sub_total {
  border-bottom: 1px solid #ebebeb;
  padding: 0px 35px 0px 24px;
}

.cart_total_inner .cart_total_text .sub_total h5 {
  line-height: 56px;
  margin-bottom: 0px;
  font-size: 16px;
  font-family: "Open Sans", sans-serif;
  color: #242424;
}

.cart_total_inner .cart_total_text .sub_total h5 span {
  float: right;
  line-height: 56px;
  color: #797979;
}

.cart_total_inner .cart_total_text .total {
  padding: 0px 35px 0px 24px;
  border-bottom: 1px solid #ebebeb;
}

.cart_total_inner .cart_total_text .total h4 {
  line-height: 56px;
  margin-bottom: 0px;
  font-size: 16px;
  font-family: "Open Sans", sans-serif;
  color: #242424;
}

.cart_total_inner .cart_total_text .total h4 span {
  float: right;
  font-weight: 600;
}

.cart_total_inner .cart_total_text .cart_footer {
  overflow: hidden;
}

.cart_total_inner .cart_total_text .cart_footer .pest_btn {
  float: right;
  margin-top: 20px;
  margin-bottom: 20px;
  margin-right: 30px;
  line-height: 42px;
  padding: 0px 22px;
}
#cart1{
  border: 1px solid #ebebeb;
  line-height: 56px;
  padding: 0px;
  color: #3e606b;
  font-family: "Playfair Display", serif;
  font-weight: bold;
  font-size: 20px;
  text-align: center;
}
.pest_btn {
    background: #457af5;
    color: #fff;
    line-height: 36px;
    display: inline-block;
    padding: 0px 25px;
    font-family: "Open Sans", sans-serif;
    position: relative;
    overflow: hidden;
    font-size: 14px;
    font-weight: 600;
    border-radius: 3px;
}


/* End Cart Page Area css
============================================================================================ */
}
</style>

      
               <section class="cart_table_area p_100">
            <div class="container">
            

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">package Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Person</th>
                                <th scope="col">Days</th>
                                <th scope="col">Total</th>
                                <th scope="col">option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total=0;
                         while ($row=mysqli_fetch_array($sql)) {?>
                            <tr>
                                <td id="cart1">
                                    <img src="Admin Panel/image/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" width="200" height="150">
                                </td>
                                <td id="cart1"><?php echo $row['package_name']; ?></td>
                                <td id="cart1">&#x20B9;<?php echo $row['sub_price']+$row['hotel_price']; ?></td>
                                <td id="cart1"><?php echo $row['person']; ?></td>
                                 <td id="cart1"><?php echo $row['days']; ?></td>
                                <td id="cart1">&#x20B9;<?php echo $row['total']; $total+=$row['total'];  ?></td>
                                <td id="cart1"><a href="cart_delete.php?id=<?php echo $row['Id']; ?>" >Delete</a>
                            </tr>   
                            <?php } ?>      
                            
                        </tbody>
                    </table>
                </div>
                <div class="row cart_total_inner">
                    <div class="col-lg-7"></div>
                    <div class="col-lg-5">
                        <div class="cart_total_text">
                            <div class="cart_head">
                                Cart Total
                            </div>
                           
                            <div class="total">
                                <h4>Total <span id="total_final_amount">
                                    
                                    <?php echo $total; ?></span></h4>
                            </div>
                            <div class="cart_footer">
                                <?php if($total != 0){ ?> 
                                    <a href="checkout.php" class="pest_btn">Process To CheckOut</a>
                                <!-- <a class="pest_btn" href="Checkout.php">Proceed to Checkout</a> -->
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
           
        <!--================End Cart Table Area =================-->
<?php 

include 'footer.php';

?>
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