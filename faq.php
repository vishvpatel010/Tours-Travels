<?php 
include'header.php';
$sql=mysqli_query($conn,"select *from faq");
?>

<section class="price_list_area p_100">
        	<div class="container">
        		<div class="price_list_inner">
        			<div class="single_pest_title">
        				<h2 style="text-align: center; font-family: 'Times New Roman', Times, serif; ">FAQ</h2><br>
        				
        			</div>
       				<div class="row">
       					<?php while($row=mysqli_fetch_array($sql))
       					{
       						?>
       					<div class="col-lg-6">
       					
       						<div class="discover_item_inner">
       							<div class="discover_item">
									<h4 style="font-family: 'Times New Roman', Times, serif;"><?php echo $row['Question']; ?></h4>
									<p style="text-align: justify;"><?php echo $row['Answer']; ?>
									</p>
								</div>
								
       						</div>
       					
       					</div>
       					<?php
       					}
       					?>
       				
        		</div>
        	</div>
        </section>

        <?php 

        include 'footer.php';

    ?>
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

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>