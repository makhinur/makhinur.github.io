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
				<div class="col-9">
					<div class="jumbotron bg-light p-5"> 
					  <div class="d-flex justify-content-between">
					  	<div>
					  		<h3 class="text-dark mb-2 "><?php echo $USER->full_name; ?></h3>
					  		<h5 class="text-dark"><?php echo $USER->email; ?></h5>
					  	</div>
					  	<div class="mr-5 my-auto">
					  		<a href="updateprofile" class="h5 text-primary" style="text-decoration: none;">Change</a>
					  	</div>
					  </div>
					  <div class="col-12 bg-light rounded p-0 mt-2">
					  	<?php 
					  		$address = $_REQUEST['ADDRESS'];
					  		if($address!=null){
					  	?>
					  			<div>
								    <p>
									  <a class="btn btn-outline-dark col-12 mt-4" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
									    My address
									  </a>
									</p>
									<div class="collapse mb-5" id="collapseExample">
									  <div class="card card-body">
									    <div class="container bg-light rounded">
									    	<form action="toupdateaddress" method="post">
								    		  <h3 class="text-dark mb-3">Delivery address</h3>
											  <div class="form-group">
											    <label>Address</label>
											    <input type="text" class="form-control" name="address1" value="<?php echo $address->address1; ?>">
											    <input type="text" class="form-control" name="user_id" value="<?php echo $USER->id; ?>" hidden>
											  </div>
											  <div class="form-group">
											    <label>Address 2</label>
											    <input type="text" class="form-control" name="address2" value="<?php echo $address->address2; ?>">
											  </div>
											  <div class="form-row">
											    <div class="form-group col-md-6">
											      <label>City</label>
											      <input type="text" class="form-control" name="city" value="<?php echo $address->city; ?>">
											    </div>
											    <div class="form-group col-md-4">
											      <label>Country</label>
											      <input type="text" class="form-control" name="country" value="<?php echo $address->country; ?>">
											    </div>
											    <div class="form-group col-md-2">
											      <label>Zip</label>
											      <input type="text" class="form-control" name="zip" value="<?php echo $address->zip; ?>">
											    </div>
											  </div>
											  <div class="form-group">
											    <div class="form-check">
											      <input class="form-check-input" type="checkbox" name="checkbox" value="yes" <?php if($address->receive_commercials === "yes"){ echo "checked";} ?>>
											      <label class="form-check-label">
											        Receive personalised commercial communications by email.
											      </label>
											    </div>
											  </div>
									  		  <button class="btn btn-primary col-12">UPDATE ADDRESS</button>
									    	</form>
											<a href="todeleteaddress?id=<?php echo $address->id; ?>" class="btn btn-outline-danger col-12 mt-3 mb-4">DELETE ADDRESS</a>	
										</div>
									  </div>
									</div>
								</div>
					  	<?php 
					  		}else{ 
					  	?>
							  	<div>
								    <p>
									  <a class="btn btn-outline-dark col-12 mt-4" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
									    +add address
									  </a>
									</p>
									<div class="collapse mb-5" id="collapseExample">
									  <div class="card card-body">
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
									  </div>
									</div>
								</div>
						<?php 
							} 
					  	?>
				  			<div>
							    <p>
								  <a class="btn btn-dark col-12 mb-4" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
								    Orders history
								  </a>
								</p>
								<div class="collapse mb-5" id="collapseExample2">
								  	<div class="card card-body">
								    	<div class="container bg-light rounded">
								    	<?php
								    		$orders = $_REQUEST['ORDERS'];
				  							if($orders!=null){
												foreach($orders as $order){
										?>
												  	<table class="table table-borderless">
													  <thead>
													    <tr>
													      <th style="width: 40%;" scope="col">Item</th>
													      <th style="width: 20%;" class="text-center" scope="col">Quantity</th>
													      <th style="width: 20%;" class="text-center" scope="col">Price</th>
													      <th style="width: 20%;" class="text-center" scope="col">Date</th>
													    </tr>
													  </thead>
													  <tbody>
													    <tr>
													      <td class="d-flex">
													      	<img src="<?php if($order->item_img==="none"){echo "https://lustersnewfaceofpinkintl.com/wp-content/uploads/2020/04/image-coming-soon.jpg"; }else{echo $order->item_img;}; ?>" class="rounded mr-3" style="height: 70px; width: 95px;">
														    <?php echo $order->item_model; ?>
														    <br>size: <?php echo strtoupper($order->item_size);?>
														  </td>
													      <td>
													      	<div class="d-flex justify-content-around">
													      		<p class="text-center my-auto"><?php echo $order->item_quantity; ?></p>
													      	</div>
													      </td>
													      <td class="text-center"><?php echo $order->item_price; ?> KZT</td>
													      <td class="text-center"><?php echo $order->date; ?></td>
													    </tr>
													  </tbody>
													</table>
										<?php
												}
											}else{
										?>
											<h6 class="my-3">No orders yet.</h6>
										<?php
											}
										?>			
										</div>
									</div>
								</div>
							</div>
					   </div>
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