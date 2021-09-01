<?php 
	if($online){ 
?>
		<form class="bg-light p-4 rounded mt-4" action="toaddreview" method="post">
			<input type="hidden" name="item_id" value="<?php echo $_GET['id']; ?>">
			<input type="hidden" name="user_id" value="<?php echo $USER->id; ?>">
			<div class="form-group text-center mb-3">
				<label>Rate: </label>
				<select name="stars_count">
					<option value="1">★</option>
					<option value="2">★★</option>
					<option value="3">★★★</option>
					<option value="4">★★★★</option>
					<option value="5">★★★★★</option>
				</select>
			</div>
		   	<div class="form-group">
				<textarea class="form-control" name="review_text"></textarea>
			</div>				  
			<button type="submit" class="form-control btn btn-dark">Submit a review</button>		 
		</form>
<?php 
	} 
	$reviews = $_REQUEST['REVIEWS_LIST'];
	$reviewLikes = $_REQUEST['REVIEW_LIKES_LIST'];
	$users = $_REQUEST['USERS_LIST'];

	if($reviews!=null && $users!=null){
		if(!$online){
?>
			<h5 class="text-center mt-4">Sign in to write a review.</h5>
<?php
		}

		foreach($reviews as $review){
?>
			<div class="jumbotron mt-4 bg-light py-4">
			  <div class="row">
			  	<div class="col-11 mx-auto">
			  		<div>
			  			<div>
			  				<?php 
			  					if($review->stars_count == 1){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php
			  					}else if($review->stars_count == 2){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php 
			  					}else if($review->stars_count == 3){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
			  				<?php 
			  					}else if($review->stars_count == 4){
			  				?>
			  						<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
			  				<?php 
			  					}else if($review->stars_count == 5){
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
					  		<p class="mt-2 mb-0 font-weight-bold">
					  			<?php 
					  				foreach($users as $user){
					  					if($review->user_id === $user->id){
					  						echo $user->full_name;
					  					}
					  				}
					  			?>
					  		</p>
					  		<p><?php echo $review->post_date; ?></p>
					  	</div>
			  			<p class="lead"><?php echo htmlspecialchars_decode($review->review_text); ?></p>
			  			<hr class="my-4">
			  		</div>
			  		<div class="d-flex justify-content-between">
			  			<div>
			  			<?php 
		  					if($online){
		  						$liked = false;
								if($reviewLikes!=null){
									foreach($reviewLikes as $rlike){
										if($review->id===$rlike->review_id && $USER->id===$rlike->user_id){
											$liked = true;
										}
									}
								}
								if($liked){
			  				?>
						  			<form action="toremovelike" method="post">
						  				<input type="hidden" name="review_id" value="<?php echo $review->id; ?>">
						  				<input type="hidden" name="user_id" value="<?php echo $USER->id; ?>">
						  				<input type="hidden" name="like_count" value="<?php echo $review->like_count; ?>">
						  				<button class="btn btn-danger" style="height: 38px;">
							  				<div class="row">
												<svg style="margin: 1px 10px 0 20px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
												  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.964.22.817.533 2.512.062 4.51a9.84 9.84 0 0 1 .443-.05c.713-.065 1.669-.072 2.516.21.518.173.994.68 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.162 3.162 0 0 1-.488.9c.054.153.076.313.076.465 0 .306-.089.626-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.826 4.826 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.616.849-.231 1.574-.786 2.132-1.41.56-.626.914-1.279 1.039-1.638.199-.575.356-1.54.428-2.59z"/>
												</svg>
							  					<p class="mr-4"><?php echo $review->like_count; ?></p>
							  				</div>
						  				</button>
						  			</form>
					  		<?php 
					  			}else{
					  		?>
					  				<form action="toaddlike" method="post">
						  				<input type="hidden" name="review_id" value="<?php echo $review->id; ?>">
						  				<input type="hidden" name="user_id" value="<?php echo $USER->id; ?>">
						  				<input type="hidden" name="like_count" value="<?php echo $review->like_count; ?>">
						  				<button class="btn btn-outline-danger" style="height: 38px;">
							  				<div class="row">
												<svg style="margin: 1px 10px 0 20px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
												  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.964.22.817.533 2.512.062 4.51a9.84 9.84 0 0 1 .443-.05c.713-.065 1.669-.072 2.516.21.518.173.994.68 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.162 3.162 0 0 1-.488.9c.054.153.076.313.076.465 0 .306-.089.626-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.826 4.826 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.616.849-.231 1.574-.786 2.132-1.41.56-.626.914-1.279 1.039-1.638.199-.575.356-1.54.428-2.59z"/>
												</svg>
							  					<p class="mr-4"><?php echo $review->like_count; ?></p>
							  				</div>
						  				</button>
						  			</form>
						  	<?php
					  			}
					  		}else{
					  		?>
				  			  	<div>
					  				<div style="height: 38px;">
						  				<div class="row">
											<svg style="margin: 1px 10px 0 20px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
											  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.964.22.817.533 2.512.062 4.51a9.84 9.84 0 0 1 .443-.05c.713-.065 1.669-.072 2.516.21.518.173.994.68 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.162 3.162 0 0 1-.488.9c.054.153.076.313.076.465 0 .306-.089.626-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.826 4.826 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.616.849-.231 1.574-.786 2.132-1.41.56-.626.914-1.279 1.039-1.638.199-.575.356-1.54.428-2.59z"/>
											</svg>
						  					<p class="mr-4"><?php echo $review->like_count; ?></p>
						  				</div>
					  				</div>
					  			</div>
					  		<?php
					  		}
					  		?>
				  		</div>
				 		<?php if($online && $USER->id===$review->user_id){ ?>
				  			<div class="row col-5 p-0">
							  	<!-- <a class="col-6 m-0 p-1" href="#" method="get">
									<button class="btn btn-outline-dark rounded-pill col-12" role="button">Edit</button>
							  	</a> -->
							  	<form class="col-6 m-0 p-1" action="todeletereview" method="post">
							  		<input type="hidden" name="review_id" value="<?php echo $review->id; ?>">
									<button class="btn btn-outline-danger rounded-pill col-12" role="button">Delete</button>
							  	</form>
							</div>	
						<?php } ?>
			  		</div>
			  	</div>
			  </div>
			</div>
<?php 
		}
	}else{
		if($online){
?>	
			<h5 class="text-center mt-4">Be the first to review this product.</h5>
<?php
		}else{
?>
			<h5 class="text-center mt-4">Sign in to be the first to review this product.</h5>
<?php
		}
	}
?>