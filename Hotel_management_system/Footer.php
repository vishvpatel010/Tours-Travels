<?php 
include('connection.php');
extract($_REQUEST);
if(isset($send))
{
mysqli_query($con,"insert into feedback values('','$n','$e','$mob','$msg')");	
$msg= "<h4 style='color:green;'>feedback sent successfully</h4>";
}
?>
<!-- Footer1 Start Here-->

<footer style="background: rgb(0,36,9);
background: linear-gradient(275deg, rgba(0,36,9,1) 0%, rgba(103,138,85,1) 100%, rgba(0,212,255,1) 100%);">
    <div class="container-fluid">
	<div class="col-sm-4 hov">
		<img src="logo/logo2.png"width="200px"height="50px"/><br><br>
    <p class="text-justify">A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most basic guest services and facilities. Larger, higher-priced hotels may provide additional guest facilities such as a swimming pool, business center</p><br>
      <center><a href="about.php" class="btn btn-danger"><b>Read More..</b></a></center><br><br><br>

	</div>&nbsp;&nbsp;
	<div class="col-sm-4 text-justify">
	       <h3 style="color:#000;">Contact Us</h3>
      <p style="color:black;"><strong>Address:&nbsp;</strong>Surat , GUJARAT</p>
      <p style="color:black;"><strong>Email-Id:&nbsp;</strong>hotal@gmail.com</p>
      <p style="color:black;"><strong>Contact Us:&nbsp;</strong>(+91) 9999999999</p><br><br><br>
     
	</div>&nbsp;

  <!--Feedback Start Here-->
	
</footer>
<!--Footer1 Close Here-->

<!--Footer2 start Here-->

<footer class="container-fluid text-center"style="background-color:#000408;height:40px;padding-top:10px;color:#f0f0f0;">
  <p>All Rights Reserved 2019</p>
</footer>

<!--Footer2 start Here-->