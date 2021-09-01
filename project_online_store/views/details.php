<?php

	$item = null;
	if(isset($_REQUEST['item'])){
		$item = $_REQUEST['item'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'adminnavbar.php' ?>

	<div class="container">

		<div class="row mt-3">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent">
				    <li class="breadcrumb-item"><a href="index.php">Item</a></li>
				    <li class="breadcrumb-item active" aria-current="page">
				    	<?php 
				    		if($item!=null){
				    			echo $item->model;
				    		} else {
				    			echo "404 item not found";
				    		}
				    	?>
				    </li>
				  </ol>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="col-8 offset-3">

				<?php 
				    if($item!=null){
				?>
					<form action="updateitem" method="post">
					  <input type="hidden" name="id" value="<?php echo $item->id; ?>">
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Model</label>
					    <div class="col-md-8">
					      <input type="text" class="form-control" name="model" value="<?php echo $item->model; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Producer</label>
					    <div class="col-md-8">
					      <select type="text" name="producer" class="form-control">
					      	<?php 
					      		$producers = $_REQUEST['producers'];
					      		foreach($producers as $producer){
					      	?>
					      		<option value="<?php echo $producer->id; ?>" <?php if($producer->id==$item->producer){
					      			echo "selected = 'selected'";
					      		} ?>><?php echo $producer->name; ?></option>
					      	<?php
					      		}
					      	?>
					      </select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Price</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="price" value="<?php echo $item->price; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Category</label>
					    <div class="col-md-8">
					      <select type="text" name="category" class="form-control">
					      	<?php 
					      		$categories = $_REQUEST['categories'];
					      		foreach($categories as $category){
					      	?>
					      		<option value="<?php echo $category->id; ?>" <?php if($category->id==$item->category){
					      			echo "selected = 'selected'";
					      		} ?>><?php echo $category->full_name; ?></option>
					      	<?php
					      		}
					      	?>
					      </select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size XS</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="xs" value="<?php echo $item->xs; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size S</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="s" value="<?php echo $item->s; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size M</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="m" value="<?php echo $item->m; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size L</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="l" value="<?php echo $item->l; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size XL</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="xl" value="<?php echo $item->xl; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size XXL</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="xxl" value="<?php echo $item->xxl; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size 6 - 7 years</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="from_6_to_7_years" value="<?php echo $item->from_6_to_7_years; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size 8 - 9 years</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="from_8_to_9_years" value="<?php echo $item->from_8_to_9_years; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Size 10 - 11 years</label>
					    <div class="col-md-8">
					      <input type="number" class="form-control" name="from_10_to_11_years" value="<?php echo $item->from_10_to_11_years; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Color</label>
					    <div class="col-md-8">
					      <input type="text" class="form-control" name="color" value="<?php echo $item->color; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Fabric</label>
					    <div class="col-md-8">
					      <input type="text" class="form-control" name="fabric" value="<?php echo $item->fabric; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Image 1 URL</label>
					    <div class="col-md-8">
					      <input type="text" class="form-control" name="img1" value="<?php echo $item->img1; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Image 2 URL</label>
					    <div class="col-md-8">
					      <input type="text" class="form-control" name="img2" value="<?php echo $item->img2; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label class="col-md-3 col-form-label">Image 3 URL</label>
					    <div class="col-md-8">
					      <input type="text" class="form-control" name="img3" value="<?php echo $item->img3; ?>">
					    </div>
					  </div>
					  <div class="form-group mt-4 mx-auto">
					    <button class="btn btn-success">SAVE ITEM</button>
					    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTeamModal">DELETE ITEM</button>
					  </div>
					</form>

					<!-- Modal -->
					<div class="modal fade" id="deleteTeamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					  	<form action="deleteitem" method="post">
					  		<input type="hidden" name="id" value="<?php echo $item->id; ?>">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">DELETE ITEM</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        Do you want to permanently delete item?
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						        <button class="btn btn-danger">Yes</button>
						      </div>
						    </div>
						</form>
					  </div>
					</div>

				<?php
				   	}else{
				?>
						<h1 class="display-5 text-center">404 ITEM NOT FOUND</h1>
				<?php
				   	}
		    	?>
			</div>
		</div>


	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>