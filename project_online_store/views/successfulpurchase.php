
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div class="col-9 mx-auto d-flex justify-content-around pt-5" style="min-height: 600px;">
		<div class="col-8">
			<h1 class="display-5 mb-4 text-center">Your order has been placed.</h1>
			<div class="jumbotron py-3 bg-light">
			  	<h5>Thank you for your purchase!</h5>
			  	Your order # is 28399.
			  	<br>Billing and Shipping information: 
			  	<?php 
			  		echo $USER->full_name."<br>";
			  		$address = $_REQUEST['ADDRESS'];
			  		if($address!=null){ 
					  	echo $address->address1.", ".$address->address2."<br>";
					  	echo $address->city.", ".$address->country."<br>";
					  	echo $address->zip;
					}
			  	?>
				<hr class="my-3">
				<p>Estimated delivery date: <?php echo date('F d, Y (l)', strtotime('+3 days')) ?></p>
			</div>
		</div>
	</div>

	<?php 
		include_once 'footer.php';
	?>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>