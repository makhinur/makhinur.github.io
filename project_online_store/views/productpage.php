<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php 
		include_once 'navbar.php';
		$item = $_REQUEST['ITEM_OBJECT']; 
		$producers = $_REQUEST['PRODUCERS_LIST'];
		$categories = $_REQUEST['CATEGORIES_LIST'];
		if($item!=null && $item->id!=null){
	?>
		<div class="container col-9">
		<?php 
			foreach($categories as $category){
				if($item->category===$category->id){
		?>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb bg-white">
					    <li class="breadcrumb-item"><a href="category?id=<?php echo $item->category; ?>"><?php echo $category->gender; ?></a></li>
					    <li class="breadcrumb-item"><a href="category?id=<?php echo $item->category; ?>"><?php echo $category->full_name; ?></a></li>
				    	<li class="breadcrumb-item active" aria-current="page"><?php echo $item->model; ?></li>
					  </ol>
					</nav>
		<?php 
				}
			}
		?>
			<div class="d-flex p-3 justify-content-around">
				<div class="col-7">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 30rem;">
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img class="d-block w-100" src="<?php if($item->img1==="none"){echo "https://lustersnewfaceofpinkintl.com/wp-content/uploads/2020/04/image-coming-soon.jpg"; }else{echo $item->img1;}; ?>" class="card-img-top" style="height: 400px;" alt="First slide">
					    </div>
					    <?php 
					    	if($item->img2!="none"){
					    ?>
							    <div class="carousel-item">
							      <img class="d-block w-100" src="<?php echo $item->img2; ?>" style="height: 400px;" alt="Second slide">
							    </div>
					    <?php 
					    	}
					    	if($item->img3!="none"){
					    ?>
							    <div class="carousel-item">
							      <img class="d-block w-100" src="<?php echo $item->img3; ?>" style="height: 400px;" alt="Third slide">
							    </div>
					    <?php 
					    	}
					    ?>
					  </div>
					  <div class="carousel-indicators">
					    <img src="<?php if($item->img1==="none"){echo "https://lustersnewfaceofpinkintl.com/wp-content/uploads/2020/04/image-coming-soon.jpg"; }else{echo $item->img1;}; ?>" class="card-img-top m-1" style="width: 100px; height: 80px;" data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
					    <img <?php if($item->img2==="none"){ echo "hidden"; } ?> src="<?php echo $item->img2; ?>" class="card-img-top m-1" style="width: 100px; height: 80px;" data-target="#carouselExampleIndicators" data-slide-to="1">
					    <img <?php if($item->img3==="none"){ echo "hidden"; } ?> src="<?php echo $item->img3; ?>" class="card-img-top m-1" style="width: 100px; height: 80px;" data-target="#carouselExampleIndicators" data-slide-to="2">
					  </div> 
					</div>
				</div>
				<form class="col-4" action="addtocart" method="post">
					<?php
						$pr = "No Name";
						$countryofpr = "Not known";
						foreach($producers as $producer){
							if($item->producer===$producer->id){
								$pr = $producer->name;
								$countryofpr = $producer->country_of_production;
							}
						}
					?>
				    <p class="h3"><?php  echo $pr." | ".$item->model; ?></p>
				    <p class="card-text"><?php echo $item->price; ?> KZT</p>
				    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
				    <input type="hidden" name="model" value="<?php echo $item->model; ?>">
				    <input type="hidden" name="price" value="<?php echo $item->price; ?>">
				    <input type="hidden" name="img1" value="<?php echo $item->img1; ?>">
				    <div class="my-3">
				    	<div>
			  				<?php 
			  					$average_stars_count = $_REQUEST['AVERAGE_STARS_COUNT']; 
			  					if($average_stars_count == 0){
			  				?>
			  						<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php
			  					}else if($average_stars_count == 1){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php
			  					}else if($average_stars_count == 2){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php 
			  					}else if($average_stars_count == 3){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php 
			  					}else if($average_stars_count == 4){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
			  				<?php 
			  					}else if($average_stars_count == 5){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
			  				<?php 
			  					}else{
			  				?>
			  						<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php 
			  					} 
			  				?> 
					  	</div> 	
				   		<p class="h6 mt-2">Color: <?php echo $item->color; ?></p>
				    	<p class="h6">Size:</p>
				    	<select class="form-control col-5" name="size" required>
				    		<?php if($item->xs > 0){ ?><option value="xs">XS</option><?php }?>
				    		<?php if($item->s > 0){ ?><option value="s">S</option><?php }?>
				    		<?php if($item->m > 0){ ?><option value="m">M</option><?php }?>
				    		<?php if($item->l > 0){ ?><option value="l">L</option><?php }?>
				    		<?php if($item->xl > 0){ ?><option value="xl">XL</option><?php }?>
				    		<?php if($item->xxl > 0){ ?><option value="xxl">XXL</option><?php }?>
				    		<?php if($item->from_6_to_7_years > 0){ ?><option value="6 - 7 years">6-7 years</option><?php }?>
				    		<?php if($item->from_8_to_9_years > 0){ ?><option value="8 - 9 years">8-9 years</option><?php }?>
				    		<?php if($item->from_10_to_11_years > 0){ ?><option value="10 - 11 years">10-11 years</option><?php }?>
				    	</select>
				    </div>
				    <!-- <a href="basket?id=<?php echo $item->id; ?>" class="btn btn-primary btn-block">BUY NOW</a> -->
				    <button type="submit" class="btn btn-outline-primary btn-block">ADD TO CART</button>
				</form>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="toCartModal" tabindex="-1" role="dialog" aria-labelledby="toCartModal" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="toCartModal">Item successfully added to the basket.</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        TOTAL (1 item): 11 000 KZT.
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Continue shopping</button>
			        <button type="button" class="btn btn-dark">Proceed to checkout</button>
			      </div>
			    </div>
			  </div>
			</div>

					
			<div class="mt-5">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery" aria-selected="false">Delivery options</a>
				  </li>
				</ul>
				<div class="tab-content col-11 mx-auto" id="myTabContent">
				  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
				  	<?php 
				  		include_once 'productdescription.php';
				  	?>
				  </div>
				  <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
				  	<style type="text/css">
				  		.checked {
						  color: orange;
						}
				  	</style>
				  	<?php 
				  		include_once 'reviewspage.php';
				  	?>
				  </div>
				  <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
				  	<?php 
				  		include_once 'deliveryoptionspage.php';
				  	?>
				  </div>
				</div>
			</div>
		</div>
	<?php 
		}else{
	?>
		<div style="height: 500px; margin-top: 20px;">
			<h3 class="text-center">404 PRODUCT NOT FOUND</h3>
		</div>
	<?php
		}
	?>

	<?php 
		include_once 'footer.php';
	?>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>