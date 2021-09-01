<?php 
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'textarea'});</script>
	<style>
		img{
			max-width: 100%;
		}
	</style>
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div class="row mt-4">
		<div class="offset-3 col-6">
			<?php 

				if(isset($_GET['id']) && is_numeric($_GET['id'])){

					$tweet = getTweet($_GET['id']);
					 
					if($tweet!=null){
						$user_data = getUserData($tweet['user_id']);
			?>
						<div class="jumbotron mb-2">
						  <div class="row">
						  	<div class="col-2 d-flex justify-content-center p-0">
						  		<img class="rounded-circle" src="<?php echo $user_data['avatar'] ?>" style="height: 100px; width: 100px;">
						  	</div>
						  	<div class="col-9">
						  		<div class="row mb-2">
						  			<div class="col-7">
								  		<h3><?php echo $user_data['name']." ".$user_data['surname'] ?></h3>
								  		<h5><?php echo $tweet['email']; ?></h5>
								  	</div>
						  		</div>
						  		<div>
						  			<p class="lead"><?php echo htmlspecialchars_decode($tweet['tweet']); ?></p>
						  			<hr class="mt-4">
						  			<p class="mr-5 mb-0">Posted on <?php echo $tweet['post_date'] ?></p>
						  		</div>
						  	</div>
						  </div>
						</div>

						<form class="bg-light p-4 rounded mb-3" action="toanswertweet.php" method="post">
							<input type="hidden" name="tweet_id" value="<?php echo $tweet['id']; ?>">
						   	<div class="form-group">
								<textarea class="form-control" name="answer"></textarea>
							</div>				  
							<button type="submit" class="form-control btn btn-dark">Reply</button>		 
						</form>

						<?php 
							$answers = getAllTweetAnswers($tweet['id']);
							$tweet_author = getUserById($tweet['user_id']);
							if($answers!=null){
						?>
							<h3>Replies</h3>
						<?php
								foreach($answers as $answer){
						?>
									<div class="jumbotron mb-3">
									  <div class="row">
									  	<div class="col-2 m-0 p-0 d-flex justify-content-center">
									  		<img class="rounded-circle" src="<?php echo $answer['avatar'] ?>" style="height: 100px; width: 100px;">
									  	</div>
									  	<div class="col-9">
									  		<div class="row mb-2">
									  			<div class="col-6">
											  		<h5><?php echo $answer['email']; ?></h5>
											  		<h6 class="mr-5">Replying to <a href="£"><?php echo $tweet_author['email']; ?></a></h6>
											  	</div>
						<?php 
							if($CURRENT_USER['id']===$answer['user_id']){
						?>
											  	<div class="row col-6 p-0">
												  	<a class="col-6 m-0 p-1" href="editanswer.php?id=<?php echo $answer['id']; ?>" method="get">
														<button class="btn btn-outline-secondary rounded-pill col-12 btn-lg" role="button">Edit</button>
												  	</a>
												  	<form class="col-6 m-0 p-1" action="todeleteanswer.php" method="post">
												  		<input type="hidden" name="answer_id" value="<?php echo $answer['id']; ?>">
												  		<input type="hidden" name="tweet_id" value="<?php echo $tweet['id']; ?>">
														<button class="btn btn-outline-danger rounded-pill col-12 btn-lg" role="button">Delete</button>
												  	</form>
												</div>
						<?php } ?>
									  		</div>
									  		<div>
									  			<p class="lead"><?php echo htmlspecialchars_decode($answer['answer']); ?></p>
									  			<hr class="my-4">
									  			<p class="mr-5">Posted on <?php echo $answer['post_date'] ?></p>
									  		</div>
									  	</div>
									  </div>
									</div>
			<?php
								}
							}
					}else{
			?>
				<h1 class="text-center">TWEET NOT FOUND</h1>
			<?php			
					}
				}else{
			?>
				<h1 class="text-center">404 PAGE NOT FOUND</h1>
			<?php
				}
			?>
		</div>
	</div>

	<?php include_once 'footer.php' ?>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<?php 
	}else{
		header("Location:login.php");
	} 
?>