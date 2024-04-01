<?php 
ob_start();
include 'header.php';

//$name= $_SESSION['uid']['Name'];
//$email= $_SESSION['uid']['Email'];
//$mob=   $_SESSION['uid']['Number'];
if (empty($_SESSION['uid'])) {
      ?>
      <script type="text/javascript">
     window.location.href = "login.php";
     </script>
     <?php
    }
if(isset($_POST['submit']))
{
	$user_id=$_SESSION['uid']['User_Id'];
	$sub_cat_id=implode(',', $_POST['subcat']);
	$name = $_POST['fname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$notes = isset($_POST['message'])?$_POST['message']:'';
	$total=$_SESSION['total'];
	
	
	$query = "insert into orders(user_id,sub_cat_id,order_name,order_email,order_phone,order_address,order_postcode,order_city,order_amount,order_notes) values($user_id,'$sub_cat_id','$name','$email','$phone','$address',$zip,'$city',$total,'$notes')";
	$query1 = mysqli_query($conn,$query);
	$last_id = mysqli_insert_id($conn);

	if($query1)
	{
		unset($_SESSION['total']);
		echo "Data Inserted Successfully....";
		header("location:payment_gateway/stripe_pay_demo.php?orderId=$last_id");
	}
}



?>

<!DOCTYPE html>
<html lang="en">
    
<head>
	<style type="text/css">
		.pest_btn {
  background: #94c9d9;
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
	</style>
      <link rel="stylesheet" type="text/css" href="css/checkout.css"> 
        <title>Checkout Page</title>
        <script type="text/javascript">
        	function validateform()
        	{
        		x1= document.forms["checkout"]["fname"].value;
        		x2= document.forms["checkout"]["lname"].value;
        		x3= document.forms["checkout"]["address"].value;
        		x4= document.forms["checkout"]["city"].value;
        		x5= document.forms["checkout"]["state"].value;
        		x6= document.forms["checkout"]["zip"].value;
        		x7= document.forms["checkout"]["email"].value;
        		x8= document.forms["checkout"]["phone"].value;

        		if(x1 == "")
        		{
        			alert("Please Enter Your First Name");
        			return false;
        		}
        		else if(x2 =="")
        		{
        			alert("Please Enter Your Last Name");
        			return false;
        		}
        		else if(x3 =="")
        		{
        			alert("Please Enter Your Address");
        			return false;
        		}
        		else if(x4 =="")
        		{
        			alert("Please Enter Your Town/City");
        			return false;
        		}
        		else if(x5 =="")
        		{
        			alert("Please Select Your State/Country");
        			return false;
        		}
        		else if(x6 =="")
        		{
        			alert("Please Enter Your Postal/Zip");
        			return false;
        		}
        		else if(x7 =="")
        		{
        			alert("Please Enter Your Email");
        			return false;
        		}
        		else if(x8 =="")
        		{
        			alert("Please Enter Your Phone Number");
        			return false;
        		}
        		else if(x8.length<10 || x8.length>10)
        		{
        			alert("Phone number Must Be Of 10 Digits .");  
            		return false;  
        		}
        	}
        </script>
    <body>
        
        
        <!--================Billing Details Area =================-->    
        <section class="billing_details_area p_100">
            <div class="container">
                
                <div class="row">
                	<form class="billing_form row" method="post" id="contactForm"  onsubmit="return validateform()" name="checkout">
                	<div class="col-lg-7">
               	    	<div class="main_title">
               	    		<h2>Billing Details</h2>
               	    	</div>

                		<div class="billing_form_area">
                			
								<div class="form-group col-md-6">
								    <label for="first">First Name *</label>
									<input type="text" class="form-control" id="first" name="fname" placeholder="First Name" value="<?php echo $_SESSION['uid']['fname'] ?>">
								</div>
								<div class="form-group col-md-6">
								    <label for="last">Last Name *</label>
									<input type="text" class="form-control" id="last" name="lname" placeholder="Last Name" value="<?php echo $_SESSION['uid']['fname'] ?>">
								</div>
								<div class="form-group col-md-12">
								    <label for="company">Company Name</label>
									<input type="text" class="form-control" id="company" name="company" placeholder="Company Name">
								</div>
								<div class="form-group col-md-12">
								    <label for="address">Address *</label>
									<input type="text" class="form-control" id="address" name="address" placeholder="Street Address">
									<input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, Suit unit etc (optional)">
								</div>
								<div class="form-group col-md-12">
								    <label for="city">Town / City *</label>
									<input type="text" class="form-control" id="city" name="city" placeholder="Town /City">
								</div>
								<div class="form-group col-md-6">
								    <label for="state1">State / Country *</label>
									<select class="product_select" id="state1" name="state">
                                        <option data-display="Select an option">Select an option</option>
                                        <option value="Gujrat">Gujrat</option>
                                        <option value="2">Select an option</option> 
                                        <option value="4">Select an option</option>
                                        <option value="5">Select an option</option>
                                    </select>
								</div>
								<div class="form-group col-md-6">
								    <label for="zip">Postcode / Zip *</label>
									<input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode / Zip">
								</div>
								<div class="form-group col-md-6">
								    <label for="email">Email Address *</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $_SESSION['uid']['Email'] ?>">
								</div>
								<div class="form-group col-md-6">
								    <label for="phone">Phone *</label>
									<input type="number" class="form-control" id="phone" name="phone" placeholder="Select an option" value="<?php echo $_SESSION['uid']['Number'] ?>">
								</div>

								<div class="form-group col-md-12">
									<label for="phone">Order Notes</label>
									<textarea class="form-control" name="message" id="message" rows="1" placeholder="Note about your order. e.g. special note for delivery"></textarea>
								</div>
								

							
                		</div>
                	</div>
                	<div class="col-lg-5">
                		<div class="order_box_price">
                			<div class="main_title">
                				<h2>Your Order</h2>
                			</div>
                			<?php 
                				  $id=$_SESSION['uid']['User_Id'];
                				$qu="select * from cart JOIN sub_cat ON cart.sub_cat_id=sub_cat.sub_cat_id where cart.user_id=$id";
                				$qu1= mysqli_query($conn,$qu);
                				?>
							<div class="payment_list">
								<div class="price_single_cost">
									<h5>Package <span>Price</span></h5>
									<?php
									$_SESSION['total']=0; 
                                    
									while($qu2=mysqli_fetch_array($qu1)) { ?>

									<h5><?php echo $qu2['package_name']; ?> 
                                    <span> 
                                            <?php echo $qu2['total']; 
                                           $_SESSION['total']+=$qu2['total']; 
                                            ?>
                                    </span>
                                    </h5>
                                    <input type="hidden" name="subcat[]" value="<?php echo $qu2['sub_cat_id']; ?>">
									<?php  } ?>
									
									
									<h3>Total <span><?php echo $_SESSION['total']; ?></span></h3>
									<input type="submit" value="Place Order" class="btn pest_btn" name="submit">
								</div>
							<!-- 	<div id="accordion" class="accordion_area">
									<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Direct Bank Transfer
												</button>
											</h5>
										</div>
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Check Payment
												</button>
											</h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingThree">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Paypal
												<img src="img/checkout-card.png" alt="">
												</button>
												<a href="#">What is PayPal?</a>
											</h5>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
								</div> -->
								
							</div>
						</div>
                	</div>
                	</form>
                </div>
            </div>
        </section>
        <!--================End Billing Details Area =================-->   
        
       
        
        
        <!--================Search Box Area =================-->
       
        <!--================End Search Box Area =================-->
        
         <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

 <?PHP

include 'footer.php';

     ?>




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