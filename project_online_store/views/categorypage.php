<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<?php 
		include_once 'navbar.php'; 

		$items = $_REQUEST['ITEMS_LIST'];
		$producers = $_REQUEST['PRODUCERS_LIST'];
		$categories = $_REQUEST['CATEGORIES_LIST'];
		if($items!=null && $producers!=null){
			$price_do_9990 = 0;
			$price_10000_do_29990 = 0;
			$price_30000_do_49990 = 0;
			$price_ot_50000 = 0;
			$size_xs = 0;
			$size_s = 0;
			$size_m = 0;
			$size_l = 0;
			$size_xl = 0;
			$size_xxl = 0;
			$size_6_to_7_years = 0;
			$size_8_to_9_years = 0;
			$size_10_to_11_years = 0;
			$color_black = 0;
			$color_white = 0;
			$color_brown = 0;
			$color_pink = 0;
			$color_blue = 0;
			$color_red = 0;
			$color_multi = 0;

			foreach($items as $item){
				if($item->price<=9990){
					$price_do_9990++;
				}else if($item->price>9990 && $item->price<=29990){
					$price_10000_do_29990++;
				}else if($item->price>29990 && $item->price<=49990){
					$price_30000_do_49990++;
				}else if($item->price>49990){
					$price_ot_50000++;
				}
				if($item->xs>0){
					$size_xs++;
				}
				if($item->s>0){
					$size_s++;
				}
				if($item->m>0){
					$size_m++;
				}
				if($item->l>0){
					$size_l++;
				}
				if($item->xl>0){
					$size_xl++;
				}
				if($item->xxl>0){
					$size_xxl++;
				}
				if($item->from_6_to_7_years>0){
					$size_6_to_7_years++;
				}
				if($item->from_8_to_9_years>0){
					$size_8_to_9_years++;
				}
				if($item->from_10_to_11_years>0){
					$size_10_to_11_years++;
				}
				if($item->color==="black" || $item->color==="Black"){
					$color_black++;
				}else if($item->color==="white" || $item->color==="White"){
					$color_white++;
				}else if($item->color==="pink" || $item->color==="Pink"){
					$color_pink++;
				}else if($item->color==="multicolor" || $item->color==="Multicolor"){
					$color_multi++;
				}else if($item->color==="brown" || $item->color==="Brown"){
					$color_brown++;
				}else if($item->color==="blue" || $item->color==="Blue"){
					$color_blue++;
				}else if($item->color==="red" || $item->color==="Red"){
					$color_red++;
				}
			}

			foreach($categories as $category){
				if($_GET['id']===$category->id){
	?>
					<div class="container col-9">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb bg-white">
						    <li class="breadcrumb-item"><a href="#"><?php echo $category->gender; ?></a></li>
					    	<li class="breadcrumb-item active" aria-current="page"><?php echo $category->full_name;?></li>
						  </ol>
						</nav>
						<div class="d-flex justify-content-end">
							<label class="nav-link">Sort by</label>
							<div class="dropdown">
								<a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Relevance
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								    <a class="dropdown-item" href="#">Relevance</a>
									<a class="dropdown-item" href="#">Popularity</a>
							        <a class="dropdown-item" href="#">Price High to Low</a>
							        <a class="dropdown-item" href="#">Price Low to High</a>
							   	</div>
							</div>
						</div>	
					</div>
	<?php 
				}
			}
	?>
		<div class="col-12 d-flex">
			<div class="col-2">
				<ul class="list-group mt-2">
				  <li class="list-group-item">
				  	<label class="form-check-label font-weight-bold" for="defaultCheck1">
						Price (KZT)
					</label>
				  	<div class="d-flex justify-content-between align-items-center">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  <label class="form-check-label" for="defaultCheck1">
						    0 - 9 990
						  </label>
						</div>
						<span class="badge badge-primary badge-pill"><?php echo $price_do_9990; ?></span>
					</div>
					<div class="d-flex justify-content-between align-items-center">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  <label class="form-check-label" for="defaultCheck1">
						    10 000 - 29 990
						  </label>
						</div>
						<span class="badge badge-primary badge-pill"><?php echo $price_10000_do_29990; ?></span>
					</div>
					<div class="d-flex justify-content-between align-items-center">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  <label class="form-check-label" for="defaultCheck1">
						    30 000 - 49 990
						  </label>
						</div>
						<span class="badge badge-primary badge-pill"><?php echo $price_30000_do_49990; ?></span>
					</div>
					<div class="d-flex justify-content-between align-items-center">
					    <div class="form-check">
						  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
						  <label class="form-check-label" for="defaultCheck1">
						    50 000 and over
						  </label>
						</div>
						<span class="badge badge-primary badge-pill"><?php echo $price_ot_50000; ?></span>
					</div>
				   </li>
				   <?php 
				   		if($_GET['id']<7){
				   ?>
						   <li class="list-group-item">
						  	<label class="form-check-label font-weight-bold" for="defaultCheck1">
								Size
							</label>
						  	<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Extra Small
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_xs; ?></span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Small
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_s; ?></span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Medium
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_m; ?></span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Large
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_l; ?></span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Extra Large
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_xl; ?></span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Extra Extra Large
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_xxl; ?></span>
							</div>
						   </li>
					<?php 
						}else{
					?>
							<li class="list-group-item">
						  	<label class="form-check-label font-weight-bold" for="defaultCheck1">
								Size
							</label>
						  	<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    6 - 7 years
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_6_to_7_years; ?></span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    8 - 9 years
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_8_to_9_years; ?></span>
							</div>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    10 - 11 years
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $size_10_to_11_years; ?></span>
							</div>
						   </li>
					<?php 
						}
					?>
				   <li class="list-group-item">
				  	<label class="form-check-label font-weight-bold" for="defaultCheck1">
						Color
					</label>
					<?php 
						if($color_black>0){ 
					?>
						  	<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Black
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $color_black; ?></span>
							</div>
					<?php 
						} 
						if($color_white>0){ 
					?>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    White
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $color_white; ?></span>
							</div>
					<?php 
						} 
						if($color_brown>0){ 
					?>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Brown
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $color_brown; ?></span>
							</div>
					<?php 
						} 
						if($color_pink>0){ 
					?>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Pink
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $color_pink; ?></span>
							</div>
					<?php 
						} 
						if($color_multi>0){ 
					?>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Multicolor
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $color_multi; ?></span>
							</div>
					<?php 
						}
						if($color_blue>0){ 
					?>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Blue
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $color_blue; ?></span>
							</div>
					<?php 
						}
						if($color_red>0){ 
					?>
							<div class="d-flex justify-content-between align-items-center">
							    <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">
								    Red
								  </label>
								</div>
								<span class="badge badge-primary badge-pill"><?php echo $color_red; ?></span>
							</div>
					<?php 
						}
					?>
				   </li>
				</ul>
			</div>
			<div class="col-9">
				<div class="d-flex flex-wrap px-5">
					<?php 
							foreach($items as $item){
								$pr = "No Name";
								foreach($producers as $producer){
									if($item->producer===$producer->id){
										$pr = $producer->name;
									}
								}						
					?>
								<div class="card mt-2 mb-4 mx-3" style="width: 18rem;">
								  <img src="<?php if($item->img1==="none"){echo "https://lustersnewfaceofpinkintl.com/wp-content/uploads/2020/04/image-coming-soon.jpg"; }else{echo $item->img1;}; ?>" class="card-img-top" style="height: 300px;">
								  <div class="card-body d-flex justify-content-between">
								  	<div>
								  		<div style="height: 54px;">
								  			<a href="product?id=<?php echo $item->id; ?>" class="card-text text-dark"><?php echo $pr." | ".$item->model; ?></a>
								  		</div>
									    <p class="card-text"><?php echo $item->price; ?> KZT</p>
									</div>
									<div>
									    <a class="nav-link pt-0 text-primary" href="#" type="button" data-toggle="modal" data-target="<?php echo "#exampleModal".$item->id; ?>">
								          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
								            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
								          </svg>
								        </a>
								    </div>
								  </div>
								</div>

								<!-- Modal -->
								<div class="modal fade" id="<?php echo "exampleModal".$item->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered">
								    <div class="modal-content">
								    	<form action="addtocart" method="post">
									      <div class="modal-header">
									      	<input type="hidden" name="id" value="<?php echo $item->id; ?>">
										    <input type="hidden" name="model" value="<?php echo $item->model; ?>">
										    <input type="hidden" name="price" value="<?php echo $item->price; ?>">
										    <input type="hidden" name="img1" value="<?php echo $item->img1; ?>">
									        <h5 class="modal-title" id="exampleModalLabel">Select size</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <select class="form-control col-8 mx-auto" name="size" required>
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
									      <div class="modal-footer">
									        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">CANCEL</button>
									        <button type="submit" class="btn btn-primary">ADD TO CART</button>
									      </div>
									    </form>
								    </div>
								  </div>
								</div>
					<?php
							}
					?>
				</div>
				<div class="d-flex justify-content-end mt-5">
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item disabled">
					      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
					    </li>
					    <li class="page-item"><a class="page-link" href="#">1</a></li>
					    <li class="page-item active" aria-current="page">
					      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
					    </li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item">
					      <a class="page-link" href="#">Next</a>
					    </li>
					  </ul>
					</nav>
				</div>
			</div>
		</div>
			
	<?php
		}else{
	?>
			<div style="min-height: 600px; width: 100%; margin-top: 50px;">
				<h3 class="text-center">404 PAGE NOT FOUND</h3>
			</div>	
	<?php
		}

		include_once 'footer.php';
	?>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>