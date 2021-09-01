<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php include_once 'adminnavbar.php' ?>

	<div class="col-4 mx-auto pt-5" style="min-height: 600px;">
		<?php 
			if(isset($_GET['success'])){
		?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Item added successfully!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
		<?php 
			}else if(isset($_GET['error'])){
		?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Cannot add item
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
		<?php 
			}
			
			$items = $_REQUEST['items'];
		?>
		<form class="container col-10 bg-light p-4 rounded" action="toadditem" method="post">
		  <h3 class="text-dark mb-3 text-center">Add New Item</h3>
		  <div class="form-group">
		    <input type="text" class="form-control" placeholder="Model" name="model" required>
		  </div>
		  <div class="form-group">
		    <select class="form-control" name="producer" required>
		    	<option>Select producer...</option>
		    	<?php 
		    		$producers = $_REQUEST['producers'];
		    		foreach($producers as $producer){
		    	?>
		    			<option value="<?php echo $producer->id; ?>"><?php echo $producer->name; ?></option>
		    	<?php 
		    		} 
		    	?>
		    </select>
		  </div>
		  <div class="form-group">
		    <select class="form-control" name="category" required>
		    	<option>Select category...</option>
		    	<?php 
		    		$categories = $_REQUEST['categories'];
		    		foreach($categories as $category){
		    	?>
		    			<option value="<?php echo $category->id; ?>"><?php echo $category->full_name; ?></option>
		    	<?php 
		    		} 
		    	?>
		    </select>
		  </div>
		  <div class="form-group">
		    <input type="number" class="form-control" placeholder="Price" name="price" required>
		  </div>
		  <div class="form-group">
		  	<select class="form-control" name="size" required>
	    		<option value="xs">XS</option>
	    		<option value="s">S</option>
	    		<option value="m">M</option>
	    		<option value="l">L</option>
	    		<option value="xl">XL</option>
	    		<option value="xxl">XXL</option>
	    		<option value="from_6_to_7_years">6 - 7 years</option>
	    		<option value="from_8_to_9_years">8 - 9 years</option>
	    		<option value="from_10_to_11_years">10 - 11 years</option>
	    	</select>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" placeholder="Color" name="color" required>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" placeholder="Fabric" name="fabric" required>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" placeholder="Image 1 URL" name="img1">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" placeholder="Image 2 URL" name="img2">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" placeholder="Image 3 URL" name="img3">
		  </div>
		  <div class="form-group">
		  	<button class="form-control btn btn-dark">ADD</button>
		  </div>
		</form>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>






















