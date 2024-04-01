<?php
    include 'header.php';
    
    $user_id=$_SESSION['uid']['User_Id'];
    $sql=mysqli_query($conn,"select *from cart where user_id=$user_id");
?>                          
   


      <section class="cart_table_area p_100">
            <div class="container">
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">package Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row=mysqli_fetch_array($sql)) {?>
                            <tr>
                                <td>
                                    <img src="Admin Panel/image/<?php echo $row['image'] ?>" alt="" width="90%">
                                </td>
                                <td><?php echo $row['package_name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td></td>
                                <td>80$</td>
                                <td><a href="cart_delete.php?id=<?php echo $row['Id']; ?>" >delete</a></td>
                            </tr>   
                            <?php } ?>      
                            <tr>
                                <td>
                                    <form class="form-inline"> 
                                        <div class="form-group"> 
                                            <input type="text" class="form-control" placeholder="Coupon code">
                                        </div>
                                        <button type="submit" class="btn">Apply Coupon</button>
                                    </form>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="pest_btn" href="#">Add To Cart</a>
                                </td>
                            </tr>
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
                            <div class="sub_total">
                                <h5>Sub Total <span>$25.00</span></h5>
                            </div>
                            <div class="total">
                                <h4>Total <span>$25.00</span></h4>
                            </div>
                            <div class="cart_footer">
                                <a class="pest_btn" href="#">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Cart Table Area =================-->

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