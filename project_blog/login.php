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
	<div style="background: url('mountains.jpg'); width: 100%; min-height: 980px; padding-top: 250px">
		<div class="container col-4 text-center mx-auto">
			<?php  
				if(isset($_GET['error'])){
			?>
				<div class="col-10 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
				  Incorrect email or password!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php 
				}
			?>
			<?php  
				if(isset($_GET['success'])){
			?>
				<div class="col-10 mx-auto alert alert-success alert-dismissible fade show" role="alert">
				  User added successfully!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php 
				}
			?>
			<form class="container col-10 bg-light p-4 rounded" action="auth.php" method="post">
			  <h3 class="text-dark mb-3">Log in</h3>
			  <div class="form-group">
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" required>
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
			  </div>
			  <div class="form-group">
			    <button type="submit" class="form-control btn btn-dark">Log in</button>
			  </div>
			  <p><a href="pass_recovery.php">Forgot password?</a> | <a href="register.php"> Register</a></p>
			</form>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>