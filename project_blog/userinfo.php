<?php 
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){
		$follows = getAllFollowing($_GET['id']);
		$followers = getAllFollowers($_GET['id']);
?>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	<body>
		<?php include_once 'navbar.php';

			if(isset($_GET['id']) && is_numeric($_GET['id'])){
				
				$user_data = getUserData($_GET['id']);
						
				if($user_data!=null){
	
		?>
				<div class="container p-4 mt-5 bg-light">
					<div class="container d-flex mb-5">
						<div class=" col-4 m-3">
							<img class="rounded-circle" src="<?php echo $user_data['avatar'] ?>" style="height: 250px; width: 250px;">
						</div>
						<div class="col-3 mt-5">
							<h3><?php echo $user_data['name']." ".$user_data['surname']; ?></h3>
							<h5><?php echo getUserById($_GET['id'])['email']; ?></h5>
							<div style="display: flex;">
								<b class="mr-1"><?php echo sizeof($follows); ?> </b><a class="text-dark mr-3" href="following.php?id=<?php echo $_GET['id']; ?>"> Following</a>
								<b class="mr-1"><?php echo sizeof($followers); ?> </b><a class="text-dark" href="followers.php?id=<?php echo $_GET['id']; ?>"> Followers</a>
							</div>
						</div>
						<div class="row col-4 mt-5 mx-auto">
								<a class="btn btn-outline-primary rounded-pill col-10 mr-3 btn-lg" href="dialog.php?id=<?php echo $_GET['id']; ?>" role="button" style="max-height: 50px;">Message</a>		  		
						</div>
					</div>
					<div class="container">
						<div class="card">
						  <div class="card-header text-center">
						    <ul class="nav nav-pills card-header-pills">
						      <li class="nav-item">
						        <a class="nav-link" href="#">Tweets</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="#">Tweets&replies</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="#">Likes</a>
						      </li>
						    </ul>
						  </div>
						  <div class="card-body m-5">
						    <?php 
						$tweets = getAllTweets(); 
						if($tweets!=null){
							foreach($tweets as $tweet){
								if($tweet['user_id']===$_GET['id']){
					?>
								<div class="jumbotron">
								  <div class="row">
								  	<div class="col-2">
								  		<img class="rounded-circle" src="<?php echo $user_data['avatar'] ?>" style="height: 100px; width: 100px;">
								  	</div>
								  	<div class="col-9">
								  		<div class="row mb-2">
								  			<div class="col-6">
										  		<h3><?php echo $user_data['name']." ".$user_data['surname'] ?></h3>
										  		<h5><?php echo $tweet['email']; ?></h5>
										  	</div>
								  		</div>
								  		<div>
								  			<p class="lead"><?php echo htmlspecialchars_decode($tweet['tweet']); ?></p>
								  			<div style="clear:both; height: 1px;"></div>
								  			<hr class="my-4">
								  			<p>Posted on <?php echo $tweet['post_date'] ?></p>
								  		</div>
								  	</div>
								  </div>
								</div>
					<?php
								}
							} 
						}
					?>
						  </div>
						</div>
					</div>
				</div>

		<?php
				}else{
		?>
					<h1 class="text-center mt-3">USER NOT FOUND</h1>
		<?php			
				}
			}else{
		?>
				<h1 class="text-center mt-3">404 PAGE NOT FOUND</h1>
		<?php
			}

			include_once 'footer.php';
		?>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
	</html

<?php 
	}else{
		header("Location:login.php");
	} 
?>