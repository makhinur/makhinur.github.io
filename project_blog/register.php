<?php 
	require_once 'db.php';
	require_once 'user.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div style="background: url('mountains.jpg'); width: 100%; min-height: 980px; padding-top: 150px">
		<div class="container col-4 text-center mx-auto">
			<?php  
				if(isset($_GET['error'])){
			?>
				<div class="col-10 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
				  Could not add user!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php 
				}
			?>
			<form class="container col-10 bg-light p-4 rounded" action="toregister.php" method="post">
			  <h3 class="text-dark mb-3">Create your account</h3>
			  <div class="form-group">
			    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="email" required>
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" placeholder="Password" name="password" required>
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" placeholder="Retype password" name="re_password" required>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Name" name="name" required>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Surname" name="surname"required>
			  </div>
			  <div class="form-group row mx-2" required>
			  	<label class="text-secondary mr-3">Gender: </label>
			    <div class="form-check mr-4">
				  <input class="form-check-input" type="radio" name="gender" value="female">
				  <label class="form-check-label" for="exampleRadios1">
				    Female
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="gender" value="male">
				  <label class="form-check-label" for="exampleRadios2">
				    Male
				  </label>
				</div>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Country" name="country"required>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="City" name="city" required>
			  </div>
			  
			  <button type="submit" class="form-control btn btn-dark">Register</button>
			 
			</form>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>