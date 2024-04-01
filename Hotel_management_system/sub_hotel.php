<?php 
session_start();
$hotel_id=$_GET['id'];
$_SESSION['hotel_id']=$hotel_id;
if (empty($_SESSION['hotel_id'])) 
{
	?>
	<script type="text/javascript">
		window.history.back();
	</script>
	
	<?php
}
	else
	{
		?>
		<script type="text/javascript">
			window.location.href="http://localhost/tourist/sub_view.php";
		</script>
		<?php
	}

?>