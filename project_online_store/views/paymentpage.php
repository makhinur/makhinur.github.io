<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php include_once 'navbar.php'; ?>

	<div class="col-9 mx-auto d-flex justify-content-around pt-5" style="min-height: 700px;">
		<div class="col-8">	
			<div class="jumbotron bg-light pt-5">
			  	<form class="container col-11 bg-light rounded" action="tosubmitpayment" method="post">
				  <h3 class="text-dark mb-3">Payment information</h3>
				  <div class="form-group">
				    <label for="inputAddress">Full Name</label>
				    <input type="text" class="form-control" id="inputAddress" placeholder="<?php echo $USER->full_name; ?>">
				  </div>
				  <div class="form-group">
				    <label for="inputAddress2">Card Number</label>
				    <input type="text" class="form-control" id="inputAddress2" placeholder="4400 **** **** ****">
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputState">Expiration Date</label>
				      <input type="date" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputZip">Security Code</label>
				      <input type="text" class="form-control col-6 text-right" placeholder="***">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputAddress2">Email</label>
				    <input type="email" class="form-control" placeholder="<?php echo $USER->email; ?>">
				  </div>
				  <button type="submit" class="btn btn-success col-12 mt-3">SUBMIT</button>
				</form>
			</div>
		</div>
		<div class="col-4">
			<!-- <h1 class="display-5">summary.</h1> -->
			<div class="jumbotron py-3 px-2 bg-light">
			  <table class="table table-borderless">
				  <thead>
				    <tr>
				      <th class="h6" scope="col">AMOUNT PAYABLE</th>
				      <th class="h4" scope="col"><?php echo $_SESSION['SUM']; ?> KZT</th>
				    </tr>
				  </thead>
				</table>
			  <hr class="my-4">
			  <p class="text-center">By proccessing you agree with the companies terms and conditions.*</p>
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