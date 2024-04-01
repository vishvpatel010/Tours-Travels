<?php
error_reporting(0);
/**
 * Stripe - Payment Gateway integration example
 * ==============================================================================
 * 
 * @version v1.0: stripe_pay_demo.php 2016/09/29
 * @copyright Copyright (c) 2016, http://www.ilovephp.net
 * @author Sagar Deshmukh <sagarsdeshmukh91@gmail.com>
 * You are free to use, distribute, and modify this software
 * ==============================================================================
 *
 */

// Stripe library
 require 'stripe/Stripe.php';
 include('../connection.php'); 
 session_start();
 $params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_xxxxxxxxxxxxxxxxxxxxx",
	"public_live_key"  => "pk_live_xxxxxxxxxxxxxxxxxxxxx",
	"private_test_key" => "sk_test_0pKA9wCeQ6sa20s3OHtNZq8A",
	"public_test_key"  => "pk_test_CjbynvLspYOTCXoPr6QYbrv4"
);

if ($params['testmode'] == "on") {
	Stripe::setApiKey($params['private_test_key']);
	$pubkey = $params['public_test_key'];
} else {
	Stripe::setApiKey($params['private_live_key']);
	$pubkey = $params['public_live_key'];
}

if(isset($_POST['stripeToken']))
{
	
	$cvc = $_POST['cvc'];
	$cardNu = $_POST['cardNumber'];
	$expireDate = $_POST['expDate'];

	$invoice = rand(11111111,99999999);
	$amount_cents = $_POST['paymentData']*100; // Chargeble amount
	$invoiceid = $invoice;                      // Invoice ID
	$description = "Invoice #" . $invoiceid . " - " . $invoiceid;
	$query= "insert into hotel_payment(`pamount`,`card_number`,`expireDate`,`cvv_no`,`status`,`invoice`)values('$amount_cents','$cardNu','$expireDate','$cvc','success','$invoice')";
	$query1 = mysqli_query($conn,$query);
	
	$quo = "update orders set `order_status`='success' where `order_id`='$order_id'";
	$quo1 = mysqli_query($conn,$quo);

	$qu = "select * from orders where `order_id`='$order_id' AND `order_status`='success'";
	$qu1 = mysqli_query($conn,$qu);
	$qu2 = mysqli_fetch_array($qu1);

	$cartData = explode(',',$qu2['order_cart_ids']);
	$_SESSION['totalCart'] = $_SESSION['totalCart']  - count($cartData);
	for($i=0; $i<sizeof($cartData); $i++){
		$cartId = $cartData[$i];
		$q = "update cart set `status`='success' where `cart_id`='$cartId'";
		mysqli_query($conn,$q);
	}

	try {

		$charge = Stripe_Charge::create(array(		 
			  "amount" => $amount_cents,
			  "currency" => "inr",
			  "source" => $_POST['stripeToken'],
			  "description" => $description)			  
		);

		if (@$charge->card->address_zip_check == "fail") {
			throw new Exception("zip_check_invalid");
		} else if (@$charge->card->address_line1_check == "fail") {
			throw new Exception("address_check_invalid");
		} else if (@$charge->card->cvc_check == "fail") {
			throw new Exception("cvc_check_invalid");
		}
		// Payment has succeeded, no exceptions were thrown or otherwise caught				

		$result = "success";

	} catch(Stripe_CardError $e) {			

	$error = $e->getMessage();
		$result = "declined";

	} catch (Stripe_InvalidRequestError $e) {
		$result = "declined";		  
	} catch (Stripe_AuthenticationError $e) {
		$result = "declined";
	} catch (Stripe_ApiConnectionError $e) {
		$result = "declined";
	} catch (Stripe_Error $e) {
		$result = "declined";
	} catch (Exception $e) {

		if ($e->getMessage() == "zip_check_invalid") {
			$result = "declined";
		} else if ($e->getMessage() == "address_check_invalid") {
			$result = "declined";
		} else if ($e->getMessage() == "cvc_check_invalid") {
			$result = "declined";
		} else {
			$result = "declined";
		}		  
	}
	
	// echo "<BR>Stripe Payment Status : ".$result;
	
	// echo "<BR>Stripe Response : ";
	// echo "<pre>";
	// print_r($charge); exit;
}
?>

<?php 
if(!empty($_GET['orderId'])){
	$orderId = $_GET['orderId'];
	$oqu = "select * from orders where `order_id`='$orderId'";
	$oqu1 = mysqli_query($conn,$oqu);
	$odata = mysqli_fetch_array($oqu1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tourist Payment</title>
</head>
<body>
<link href="style.css" type="text/css" rel="stylesheet" />
<h1 class="bt_title">Tourist Payment</h1>

<div class="dropin-page">
  <form action="" method="POST" id="payment-form">
 

  <div class="form-row">
    <label>
      <span>Card Number</span>
      <input type="text" size="20" data-stripe="number" id="number" placeholder="4242424242424242">
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>Expiration (MM/YY)</span>
      <input type="text" size="2" data-stripe="exp_month"  id="exp_month" placeholder="02">
    </label>
    <span> / </span>
    <input type="text" size="2" data-stripe="exp_year" id="exp_year" placeholder="23">
  </div>
  <input type="hidden" name="final_amount" value="<?php echo $odata['order_final_amount']?>" id="final_amount">
  <input type="hidden" name="order_id_p" value="<?php echo $odata['order_id']?>" id="order_id_p">
  <div class="form-row">
    <label>
      <span>CVC</span>
      <input type="text" size="4" data-stripe="cvc" id="cvc" placeholder="123">
    </label>
  </div>
  <?php if(!empty($result)){ ?>
		<span class="payment-success" style="position:absolute;color:green; padding:10px; border:2px dashed green; margin-top: 20px;margin-left:200px;text-align: center;">Payment Done Successfully<br>
			Your Invoice Is ::: <?php echo $invoice; ?><br>
			<a href="../index.php" class="btn btn-success">Purchase Again</a></span><br>



<?php } ?>

   <span class="payment-errors" style="position:absolute;color:red; padding:10px; border:1px dashed red; margin-top: 20px;margin-left:200px;text-align: center;"></span><br>
  <input type="submit" class="submit" value="Submit Payment">
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- TO DO : Place below JS code in js file and include that JS file -->
<script type="text/javascript">
	$('.payment-errors').hide(); 
	Stripe.setPublishableKey('<?php echo $params['public_test_key']; ?>');
  
	$(function() {
	  var $form = $('#payment-form');
	  $form.submit(function(event) {
		// Disable the submit button to prevent repeated clicks:
		$form.find('.submit').prop('disabled', true);
	
		// Request a token from Stripe:
		Stripe.card.createToken($form, stripeResponseHandler);
	
		// Prevent the form from being submitted:
		return false;
	  });
	});

	function stripeResponseHandler(status, response) {
	  // Grab the form:
	  var $form = $('#payment-form');
	
	  if (response.error) { // Problem!
	
		// Show the errors on the form:
		$form.find('.payment-errors').text(response.error.message);
		$form.find('.submit').prop('disabled', false);
		$('.payment-errors').show(); // Re-enable submission
		$('.payment-success').hide(); // Re-enable submission
	
	  } else { // Token was created!
	
		// Get the token ID:
		var token = response.id;
		$('.payment-errors').hide(); 
		var finalAmount = $('#final_amount').val();
		var cardNumber = $('#number').val();
		var expmonth = $('#exp_month').val();
		var expyear = $('#exp_year').val();
		var expireDate = expmonth+"/"+expyear;
		var cvc = $('#cvc').val();
		var order_id = $('#order_id_p').val();
		// console.log(response);
		// alert(response);

		// Insert the token ID into the form so it gets submitted to the server:
		$form.append($('<input type="hidden" name="stripeToken">').val(token));
		$form.append($('<input type="hidden" name="paymentData">').val(finalAmount));
		$form.append($('<input type="hidden" name="cardNumber">').val(cardNumber));
		$form.append($('<input type="hidden" name="expDate">').val(expireDate));
		$form.append($('<input type="hidden" name="cvc">').val(cvc));
		$form.append($('<input type="hidden" name="order_idD">').val(order_id));
	
		// Submit the form:
		$form.get(0).submit();
	  }
	};
</script>
</body>
</html>