<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php 
		include_once 'navbar.php';
		$quantity = $_SESSION['QUANTITY']; ?>

	<div class="col-9 mx-auto d-flex justify-content-around pt-5" style="min-height: 700px;">
		<?php 
			if($online){
		?>
			<div class="col-8">
				<h1 class="display-5">delivery info.</h1>
				<div class="jumbotron bg-light pt-4">
					<?php 
				  		$address = null;
				  		if(isset($_REQUEST['ADDRESS'])){
				  			 $address = $_REQUEST['ADDRESS'];
				  		}
				  		if($address!=null){
				  	?>
						  	<form class="container bg-light rounded" method="post">
							  <!-- <h3 class="text-dark mb-3">Delivery address</h3> -->
							  <div class="form-group">
							    <label for="inputAddress">Address</label>
							    <input type="text" class="form-control" id="inputAddress" value="<?php echo $address->address1; ?>" <?php if(isset($_GET['success'])){ echo "disabled";}?>>
							  </div>
							  <div class="form-group">
							    <label for="inputAddress2">Address 2</label>
							    <input type="text" class="form-control" id="inputAddress2" value="<?php echo $address->address2; ?>" <?php if(isset($_GET['success'])){ echo "disabled";}?>>
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputCity">City</label>
							      <input type="text" class="form-control" id="inputCity" value="<?php echo $address->city; ?>" <?php if(isset($_GET['success'])){ echo "disabled";}?>>
							    </div>
							    <div class="form-group col-md-4">
							      <label for="inputState">Country</label>
							      <select id="inputState" class="form-control" <?php if(isset($_GET['success'])){ echo "disabled";}?>>
							        <option><?php echo $address->country; ?></option>
							      </select>
							    </div>
							    <div class="form-group col-md-2">
							      <label for="inputZip">Zip</label>
							      <input type="text" class="form-control" id="inputZip" value="<?php echo $address->zip; ?>" <?php if(isset($_GET['success'])){ echo "disabled";}?>>
							    </div>
							  </div>
							  <?php 
								if(!isset($_GET['success'])){
							  ?>	
							  	<a href="deliveryaddress?success" class="btn btn-dark col-12 mt-4">CONFIRM</a>
							  <?php 
								} 
							  ?>
							</form>
					<?php 
				  		}else{
				  	?>
				  			<form class="container bg-light rounded" action="toaddaddress" method="post">
							  <h3 class="text-dark mb-3">Delivery address</h3>
							  <div class="form-group">
							    <label>Address</label>
							    <input type="text" class="form-control" name="address1" placeholder="1234 Main St">
							    <input type="text" class="form-control" name="user_id" value="<?php echo $USER->id; ?>" hidden>
							  </div>
							  <div class="form-group">
							    <label>Address 2</label>
							    <input type="text" class="form-control" name="address2" placeholder="Apartment, studio, or floor">
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label>City</label>
							      <input type="text" class="form-control" name="city">
							    </div>
							    <div class="form-group col-md-4">
							      <label>Country</label>
							      <select name="country" class="form-control">
							        <option selected>Choose</option>
							        <option value="Kazakhstan">Kazakhstan</option>
							        <option value="Uzbekistan">Uzbekistan</option>
							        <option value="Uzbekistan">Spain</option>
							      </select>
							    </div>
							    <div class="form-group col-md-2">
							      <label>Zip</label>
							      <input type="text" class="form-control" name="zip">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="form-check">
							      <input class="form-check-input" type="checkbox" name="checkbox" value="yes">
							      <label class="form-check-label">
							        Receive personalised commercial communications by email.
							      </label>
							    </div>
							  </div>
							  <button class="btn btn-primary col-12 my-4">ADD ADDRESS</button>
							</form>
				  	<?php 
				  		}
				  	?>
				</div>
			</div>
		<?php 
			}else{
		?>
			<div class="col-8">
				<h1 class="display-5">personal info.</h1>
				<div class="jumbotron bg-light pt-4">
					<div class="container col-10 bg-light px-4 pt-4 pb-2 rounded" action="auth" method="post">
					  	<a href="login" style="text-decoration: none;">
							<button class="btn btn-dark btn-block">Sign in</button>
						</a>
					</div>
					<div class="container col-10 bg-light pb-4 px-4 rounded">
						<p class="text-center">or</p>
						<a href="register" style="text-decoration: none;">
							<button class="btn btn-outline-dark btn-block">Create new account</button>
						</a>
					</div>
				</div>	
			</div>
		<?php 
			}
		?>

		<div class="col-4">
			<h1 class="display-5">summary.</h1>
			<div class="jumbotron py-3 px-2 bg-light">
			  <table class="table table-borderless">
				  <thead>
				    <tr>
				      <th class="h6" scope="col">TOTAL (<?php if($quantity>1){ echo $quantity." items"; }else{ echo $quantity." item";} ?>)</th>
				      <th class="h4" scope="col"><?php echo $_SESSION['SUM']; ?> KZT</th>
				    </tr>
				  </thead>
				</table>
			  <hr class="my-4">
			  <p class="text-center">By proccessing you agree with the companies terms and conditions.*</p>
			  <?php 
				if(isset($_GET['success'])){
			  ?>
				  <p class="lead d-flex justify-content-around">
				    <a class="btn btn-success my-3 col-10" href="payment" role="button">PROCEEED TO PAYMENT</a>
				  </p>
			  <?php 
				}
			  ?>
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