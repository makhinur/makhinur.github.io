<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div class="col-4 mx-auto pt-5" style="min-height: 600px;">
		<?php 
			if(isset($_GET['error'])){
		?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Incorrect email or password
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
		<?php 
			}
		?>
		<form class="container col-10 bg-light px-4 pt-4 pb-2 rounded" action="adminauth" method="post">
		  <h3 class="text-dark mb-3 text-center">Admin Panel</h3>
		  <div class="form-group">
		    <input type="email" class="form-control" placeholder="Email" name="email" required>
		  </div>
		  <div class="form-group">
		    <input type="password" class="form-control" placeholder="Password" name="password" required>
		  </div>
		  <button class="form-control btn btn-dark">Sign in</button>
		</form>
	</div>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>