<?php
session_start();
include'connection.php';

if(isset($_REQUEST['submit']))
{

	$fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $UserName=$_POST['UserName'];
  $Email=$_POST['Email'];
  $Number=$_POST['Number'];
  $Password=$_POST['Password'];
  $Gender=$_POST['Gender'];
   $image=$_FILES['image1']['name'];

        $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
      $file_extension = pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION);
       
    
   
   if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            $danger= "Upload valiid images. Only PNG and JPEG are allowed."
        );
    }    
    else if (($_FILES["image1"]["size"] > 200000000000)) {
        $response = array(
            "type" => "error",
            $danger= "Image size exceeds 2MB"
        );
    }   
     else {
        $target = "Admin Panel/user_profile/";

        if (move_uploaded_file($_FILES['image1']['tmp_name'], $target.$image))
        {
            $response = array(
                "type" => "success",
                $success= "Image uploaded successfully."
            );

   		$insert=mysqli_query($conn,"insert into user_register(fname,lname,UserName,Email,Number,Password,Gender,image) values('$fname','$lname','$UserName','$Email','$Number','$Password','$Gender','$image')");

  		if($insert)
 		 {
 		   header("location:login.php");
 		 }
  		else
  		{
    		$danger="Not Inserted.............";
  		}
	
}}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Login</title>
	<script>
		function validateForm()
		{
 		 x1= document.forms["uregister"]["fname"].value;
 		 x8= document.forms["uregister"]["lname"].value;
 		 x2= document.forms["uregister"]["UserName"].value;
 		 x3= document.forms["uregister"]["Email"].value;
 		 x4= document.forms["uregister"]["Number"].value;
 		 x5= document.forms["uregister"]["Password"].value;
 		 x6= document.forms["uregister"]["Confirm_Password"].value;
 		 x7= document.forms["uregister"]["Gender"].value;
 		 x8= document.forms["uregister"]["image1"].value;
  	 if(x1=='')
  	 {
   			 alert("First Name must be filled out");
   			 return false;
  		}
  		else if(x8=='')
  	 {
   			 alert("Last First Name must be filled out");
   			 return false;
  		}
  		else if(x2== "")
  		 {
   			 alert("UserName must be filled out");
   			 return false;
  		}
  		else if(x3== "")
  		 {
   			 alert("Email must be filled out");
   			 return false;
  		}
  		else if(x4.value == "")
  		 {
   			alert("Error: Cell number must not be null.");
   			 return false;
			}

			else if(x4.length != 10)
			 {
   				 alert("Phone number must be 10 digits.");
   				 return false;
			}
  		else if(x5== "")
  		 {
   			 alert("Password must be filled out");
   			 return false;
  		}
  		else if(x6== "")
  		 {
   			 alert("Confirm Password must be filled out");
   			 return false;
  		}
  		else if(x5!=x6) {
  			 alert("Confirm Password must be same");
   			 return false;
  		}
  		else if(x7== "")
  		 {
   			 alert("Gender must be filled");
   			 return false;
  		}
		}
</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
if(isset($danger))
{
?>
<div class="alert alert-danger"><?php echo $danger; ?></div>
<?php } ?>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form method="POST"  onsubmit="return validateForm()" name="uregister" enctype="multipart/form-data">
					<span class="login100-form-title p-b-49">
						Register
					</span>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Name is reauired">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="fname" placeholder="Type your First Name Here">
					</div>
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Last Name</span>
						<input class="input100" type="text" name="lname" placeholder="Type your Last Name Here">
					</div>
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="UserName" placeholder="Type your username">
					</div>
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="Email" placeholder="Type your Email">
					</div>
					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Number</span>
						<input class="input100" type="number" name="Number" maxlength="10"  placeholder="Type your Number">
					</div>
<br>
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="Password" placeholder="Type your password">
					</div>
<br>
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="Confirm_Password" placeholder="Type your password">
					</div><br>
					<div >
						<span class="label-input100">Gender</span>
						<input type="radio" name="Gender" value="Male">Male&nbsp&nbsp&nbsp
						<input type="radio" name="Gender" value="Female">Female
					</div><br><br>
					<div>
					<span class="label-input100">Profile</span>
						<input type="file" class="input100" id="exampleFormControlFile1" name="image1">
					</div>					
					<div class="container-login100-form-btn">

						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								submit
							</button>
						</div>
					</div>

					

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>