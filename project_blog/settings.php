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

	<div style="width: 100%; min-height: 800px; padding-top: 60px">
		<div class="container col-4 mx-auto">
			<?php  
				if(isset($_GET['error'])){
			?>
				<div class="col-10 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
				  Could not update account info!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php 
				}
			?>
			<form class="container col-10 bg-light px-4 pt-4 mb-0 rounded" action="tosavesettings.php" method="post">
			  <h3 class="text-dark mb-3 text-center">Edit account</h3>
			  <div class="form-group">
			  	<label>Email</label>
			    <input type="email" class="form-control" aria-describedby="emailHelp" value="<?php echo $CURRENT_USER['email']; ?>" readonly name="email">
			  </div>
			  <div class="form-group">
			  	<label>Password </label>
			    <input type="password" class="form-control bg-white" value="<?php echo $CURRENT_USER['password']; ?>" name="password" readonly>
			    <a href="changepassword.php"> Change password</a>
			  </div>
			  <div class="form-group">
			  	<label>Name</label>
			    <input type="text" class="form-control" value="<?php echo $user_data['name']; ?>" name="name">
			  </div>
			  <div class="form-group">
			  	<label>Surname</label>
			    <input type="text" class="form-control" value="<?php echo $user_data['surname']; ?>" name="surname">
			  </div>
			  <div class="form-group">
			  	<label>Gender</label>
			    <input type="text" class="form-control" value="<?php echo $user_data['gender']; ?>" name="gender">
			  </div>
			  <div class="form-group">
			  	<label>Country</label>
			    <input type="text" class="form-control" value="<?php echo $user_data['country']; ?>" name="country">
			  </div>
			  <div class="form-group">
			  	<label>City</label>
			    <input type="text" class="form-control" value="<?php echo $user_data['city']; ?>" name="city">
			  </div>
			  <div class="form-group">
			  	<label>URL for Profile photo</label>
			    <input type="text" class="form-control" value="<?php echo $user_data['avatar']; ?>" name="avatar">
			  </div>
			  <div>
			  	<button type="submit" class="form-control btn btn-success">UPDATE</button>
			  </div>	 
			</form>
			<form class="container col-10 bg-light px-4 py-3 my-0 rounded" action="todeleteaccount.php" method="post">
			  <div>
			  	<input type="hidden" name="id" value="<?php echo $CURRENT_USER['id']; ?>">
			  	<button type="submit" class="form-control btn btn-danger">DELETE ACCOUNT</button>		  	
			  </div>			 
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