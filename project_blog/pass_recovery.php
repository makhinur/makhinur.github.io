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

	<div style="background: url('mountains.jpg'); width: 100%; min-height: 980px; padding-top: 200px">
	<?php  
		if(isset($_GET['success'])){
	?>
			<div class="container col-5 mx-auto alert alert-success alert-dismissible fade show text-center" role="alert">Link successfully sent. Please check your email box.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php 
		}
	?>
		<div class="container col-4 mx-auto">
			<form class="container col-10 bg-light p-4 rounded">
			  <h3 class="text-dark mb-3 text-center">Recover by Email</h3>
			  <div class="form-group">
			    <input type="email" class="form-control" placeholder="Insert Email" name="email">
			  </div>
			  
			  <a class="form-control btn btn-success" type="button" href="pass_recovery.php?success">Send me link</a>
			 
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>