<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div class="col-9 mx-auto d-flex justify-content-around pt-5" style="min-height: 600px;">
		<div class="col-8">
			<h1 class="display-5 mb-2">basket.</h1>
			<div class="jumbotron py-3 bg-light">
				<?php 						
					$cart = null;
					if(isset($_SESSION['CART'])){
						$cart = $_SESSION['CART'];
					}
					$sum = 0;
					$quantity = 0;
					if(!empty($cart)){
						foreach($cart as $item){
							$key = array_search($item, $cart);
				?>
						  	<table class="table table-borderless">
							  <thead>
							    <tr>
							      <th style="width: 50%;" scope="col">Item</th>
							      <th style="width: 25%;" class="text-center" scope="col">Quantity</th>
							      <th style="width: 25%;" class="text-center" scope="col">Price</th>
							      <th scope="col"></th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <td class="d-flex">
							      	<img src="<?php if($item->img1==="none"){echo "https://lustersnewfaceofpinkintl.com/wp-content/uploads/2020/04/image-coming-soon.jpg"; }else{echo $item->img1;}; ?>" class="rounded mr-3" style="height: 70px; width: 95px;">
								    <?php echo $item->model; ?>
								    <br>size: <?php echo strtoupper($item->size);?>
								  </td>
							      <td>
							      	<div class="d-flex justify-content-around">
							      		<!-- <button class="btn btn-outline-secondary">-</button> -->
							      		<p class="text-center my-auto"><?php echo $item->quantity; ?></p>
							      		<!-- <button class="btn btn-outline-secondary">+</button> -->
							      	</div>
							      </td>
							      <td class="text-center"><?php echo $item->price; ?></td>
							      <td>
							      	<a href="deletefromcart?id=<?php echo $key;?>" class="btn btn-outline-secondary">
							      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
										  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
										</svg>
							      	</a>
							  	  </td>
							    </tr>
							  </tbody>
							</table>
				<?php
							$sum += $item->price;
						} 
						$_SESSION['SUM'] = $sum;
						$_SESSION['QUANTITY'] = sizeof($cart);
				?>

				<hr class="my-4">

				<p class="lead">
				    <a href="deletefromcart" class="h6" style="text-decoration: none;">Remove all items</a>
				</p>

				<?php
					}else{
				?>
				<p>No items added yet.</p>
				<?php
						$_SESSION['SUM'] = 0;
						$_SESSION['QUANTITY'] = 0;
					}
					if(isset($_SESSION['SUM']) && isset($_SESSION['QUANTITY'])){
						$sum = $_SESSION['SUM'];
						$quantity = $_SESSION['QUANTITY'];
					}
				?>
			</div>
		</div>
		<div class="col-4">
			<h1 class="display-5">summary.</h1>
			<div class="jumbotron py-3 px-2 bg-light">
			  <table class="table table-borderless">
				  <thead>
				    <tr>
				      <th class="h6" scope="col">TOTAL (<?php if($quantity>1){ echo $quantity." items"; }else{ echo $quantity." item";} ?>)</th>
				      <th class="h4" scope="col"><?php echo $sum; ?> KZT</th>
				    </tr>
				  </thead>
				</table>
			  <hr class="my-4">
			  <p class="text-center">By proccessing you agree with the companies terms and conditions.*</p>
		<?php 
			if($sum>0){
		?>
			  <p class="lead d-flex justify-content-around">
			    <a class="btn btn-success my-3 col-10" href="deliveryaddress" role="button">CHECKOUT</a>
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