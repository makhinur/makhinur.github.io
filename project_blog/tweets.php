<?php 
	require_once 'db.php';
	require_once 'user.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<style>
		img{
			max-width: 100%;
		}
	</style>
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div class="row mt-4">
		<div class="col-3">
			<?php include_once 'addtweet.php' ?>
		</div>
		<div class="col-6">
			<?php 
				$tweets = getAllTweets(); 
				if($tweets!=null){
					foreach($tweets as $tweet){
						$user_data = getUserData($tweet['user_id']);
						$replies = getAllTweetAnswers($tweet['id']);
			?>
						<div class="jumbotron">
						  <div class="row">
						  	<div class="col-2 m-0 p-0 d-flex justify-content-center">
						  		<img class="rounded-circle" src="<?php echo $user_data['avatar'] ?>" style="height: 100px; width: 100px;">
						  	</div>
						  	<div class="col-9">
						  		<div class="row mb-2">
						  			<div class="col-7">
								  		<a class="h3 text-dark d-block" href="<?php 
								  							if($CURRENT_USER['id']===$tweet['user_id']){
								  								echo "profile.php";
								  							}else{
								  								echo "userinfo.php?id=".$tweet['user_id'];
								  							}
								  							?>"><?php echo $user_data['name']." ".$user_data['surname'] ?></a>
								  		<a class="h5 text-dark d-block" href="<?php 
								  							if($CURRENT_USER['id']===$tweet['user_id']){
								  								echo "profile.php";
								  							}else{
								  								echo "userinfo.php?id=".$tweet['user_id'];
								  							}
								  							?>"><?php echo $tweet['email']; ?></a>
								  	</div>
								  	<?php 
									  	if($CURRENT_USER['id']!=$tweet['user_id']){ 
									  		$follows = getAllFollowing($CURRENT_USER['id']);
									  		$isfollowing = false;
									  		if($follows!=null){	
												foreach($follows as $follow){
													if($follow['follow_id']===$tweet['user_id']){
														$isfollowing = true;
													}
												}
											}
											if($isfollowing){
								  	?>
												<form class="col-5" action="tounfollow.php" method="post">
													<input type="hidden" name="unfollow_user_id" value="<?php echo $tweet['user_id'] ?>">
											  		<button class="btn btn-primary rounded-pill col-12 btn-lg" href="#" role="button">Following</button>
											  	</form>
									<?php 
											}else{
									?>
												<form class="col-5" action="tofollow.php" method="post">
													<input type="hidden" name="follow_user_id" value="<?php echo $tweet['user_id']; ?>">
													<button class="btn btn-outline-primary rounded-pill col-12 btn-lg" href="#" role="button">Follow</button>
												</form>
									<?php
											} 
										} 
									?>
						  		</div>
						  		<div>
						  			<p class="lead"><?php echo htmlspecialchars_decode($tweet['tweet']); ?></p>
						  			<div style="clear:both; height: 1px;"></div>
						  			<hr class="my-4">
						  			<div class="row">
						  				<p class="mr-5">Posted on <?php echo $tweet['post_date'] ?></p>
						  				<a class="btn btn-outline-dark mr-3" href="readtweetanswers.php?id=<?php echo $tweet['id']; ?>" style="height: 38px;">
							  				<div class="row">
							  					<svg viewBox="0 0 26 26" style="margin: 0px 10px 0 20px;" width="28" height="28" fill="currentColor" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path></g></svg>
							  					<p class="mr-4"><?php echo sizeof($replies); ?></p>
							  				</div>
							  			</a>
							  			<?php  
							  				$likes = getAllLikes();
							  				$liked = false;
							  				if($likes!=null){
							  					foreach($likes as $like){
							  						if($tweet['id']===$like['tweet_id'] && $CURRENT_USER['id']===$like['user_id']){
							  							$liked = true;
							  						}
							  					}
							  				}
							  				if($liked){
							  			?>
									  			<form action="toremovelike.php" method="post">
									  				<input type="hidden" name="tweet_id" value="<?php echo $tweet['id']; ?>">
									  				<input type="hidden" name="like_count" value="<?php echo $tweet['like_count']; ?>">
									  				<button class="btn btn-danger" style="height: 38px;">
										  				<div class="row">
										  					<svg style="margin: 2px 10px 0 20px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
															  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
															</svg>
										  					<p class="mr-4"><?php echo $tweet['like_count'] ?></p>
										  				</div>
									  				</button>
									  			</form>	
								  		<?php  
								  			}else{
								  		?>
									  			<form action="toaddlike.php" method="post">
									  				<input type="hidden" name="tweet_id" value="<?php echo $tweet['id']; ?>">
									  				<input type="hidden" name="like_count" value="<?php echo $tweet['like_count']; ?>">
									  				<button class="btn btn-outline-danger" style="height: 38px;">
										  				<div class="row">
										  					<svg style="margin: 2px 10px 0 20px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
															  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
															</svg>
										  					<p class="mr-4"><?php echo $tweet['like_count'] ?></p>
										  				</div>
									  				</button>
									  			</form>	
								  		<?php 
								  			}
								  		?>					  				
						  			</div>
						  		</div>
						  	</div>
						  </div>
						</div>
			<?php
					} 
				}
			?>
		</div>
	</div>

	<?php include_once 'footer.php' ?>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>