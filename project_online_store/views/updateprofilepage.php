<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div class="col-9 mx-auto d-flex justify-content-around pt-5" style="min-height: 700px;">
		<?php 
		  if($online){
		?>
			<div class="col-8">
				<div class="jumbotron bg-light p-5"> 
				  <?php 
						if(isset($_GET['passwordsuccess'])){
				  ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  Password successfully updated
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
				  <?php 
						}
			      ?>
				  <form action="toupdateprofile" method="post">
			  		<div class="form-group">
			  			<label>Full Name</label>
			  			<input type="text" class="form-control" name="id" value="<?php echo $USER->id; ?>" hidden>
					    <input type="text" class="form-control" name="full_name" value="<?php echo $USER->full_name; ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
					    <input type="email" class="form-control" name="email" value="<?php echo $USER->email; ?>">
					</div>
					<div class="form-group">
						<a href="updatepassword">Update Password</a>
					</div>
				  	<div class="form-group">
				  		<button class="btn btn-primary col-12">Save</button>
				  	</div>
				  	<div class="form-group">
				  		<a href="profile" class="btn btn-outline-primary col-12">Back</a>
				  	</div>
				  </form>
				</div>
			</div>
		<?php 
			}else{
		?>
				<h1>404 PAGE NOT FOUND</h1>
		<?php 
			}
		?>
	</div>

	<?php 
		include_once 'footer.php';
	?>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>