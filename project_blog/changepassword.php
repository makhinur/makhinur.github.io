<?php 
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){
		$user_data = getUserData($CURRENT_USER['id']);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div style="width: 100%; min-height: 800px; padding-top: 100px">
		<div class="container col-4 mx-auto">
			<?php  
				if(isset($_GET['error'])){
			?>
				<div class="col-10 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
				  Could not update password!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php 
				} else if(isset($_GET['success'])){
			?>
				<div class="col-10 mx-auto alert alert-success alert-dismissible fade show" role="alert">
				  Password successfully updated!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php 
				}
			?>
			<form class="container col-10 bg-light p-4 rounded" action="tochangepassword.php" method="post">
			  <h3 class="text-dark mb-3 text-center">Change password</h3>
			  <div class="form-group">
			  	<label>Old password</label>
			    <input type="password" class="form-control" aria-describedby="emailHelp" name="old_pass" required>
			  </div>
			  <div class="form-group">
			  	<label>New password </label>
			    <input type="password" class="form-control" name="new_pass" required>
			  </div>
			  <div class="form-group">
			  	<label>Retype New password</label>
			    <input type="password" class="form-control" name="re_new_pass" required>
			  </div>
			  
			  <button type="submit" class="form-control btn btn-success">Update</button>
			 
			</form>
		</div>
	</div>

	<?php include_once 'footer.php' ?>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
<?php 
	}else{
		header("Location:login.php");
	} 
?>