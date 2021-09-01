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

			if(isset($_GET['id']) && is_numeric($_GET['id'])){

				$followers = getAllFollowers($_GET['id']); 
				if($followers!=null){
			?>
					<h3 class="text-dark mt-3 mb-3 text-center"> Followers (<?php echo sizeof($followers); ?>)</h3>
			<?php
					foreach($followers as $follower){
			?>
						<div class="jumbotron">
						  <div class="row">
						  	<div class="col-2 m-0 p-0 d-flex justify-content-center">
						  		<img class="rounded-circle" src="<?php echo $follower['avatar'] ?>" style="height: 100px; width: 100px;">
						  	</div>
						  	<div class="col-10">
						  		<div class="row mb-2">
						  			<div class="col-7">
								  		<a class="h3 text-dark d-block" href="<?php 
								  							if($CURRENT_USER['id']===$follower['follower_id']){
								  								echo "profile.php";
								  							}else{
								  								?>
								  								userinfo.php?id=<?php echo $follower['follower_id']; } ?>"><?php echo $follower['name']." ".$follower['surname']; ?></a>
								  		<a class="h5 text-dark d-block" href="<?php 
								  							if($CURRENT_USER['id']===$follower['follower_id']){
								  								echo "profile.php";
								  							}else{
								  								?>
								  								userinfo.php?id=<?php echo $follower['follower_id']; } ?>"><?php echo $follower['email']; ?></a>
								  	</div>
								  	<div class="col-5">
								<?php 
							  		if($CURRENT_USER['id']!=$follower['follower_id']){
							  			if($CURRENT_USER['id']===$_GET['id']){
							  	?>
										  	<form class="col-12 mb-2" action="toremovefollower.php" method="post">
										  		<input type="hidden" name="remove_user_id" value="<?php echo $follower['follower_id']; ?>">
												<button class="btn btn-outline-dark rounded-pill offset-2 col-10 btn-lg" href="#" role="button">Remove</button>
										  	</form>
									  	<?php 
									  	}
									  		$isfollowing = false;
									  		$follows = getAllFollowing($CURRENT_USER['id']);

									  			if($follows!=null){
									  				foreach ($follows as $follow) {
									  					if($follower['follower_id']===$follow['follow_id'] && $CURRENT_USER['id']===$follow['user_id']){
									  						$isfollowing = true;
									  					}
									  				}
									  			}
									  		if($isfollowing){
									  	?>
											  	<form class="col-12" action="tounfollow.php" method="post">
												  	<input type="hidden" name="unfollow_user_id" value="<?php echo $follower['follower_id']; ?>">
													<button class="btn btn-outline-primary rounded-pill offset-2 col-10 btn-lg" role="button">Unfollow</button>
											  	</form>
										<?php  
											}else{
										?>
											  	<form class="col-12" action="tofollow.php" method="post">
											  		<input type="hidden" name="follow_user_id" value="<?php echo $follower['follower_id']; ?>">
													<button class="btn btn-outline-success rounded-pill offset-2 col-10 btn-lg" role="button">Follow</button>
											  	</form>
										<?php 
											}
									}
										?>
									</div>
						  		</div>
						  		<div>
						  			<hr class="my-4">
						  		</div>
						  	</div>
						  </div>
						</div>
			<?php
					} 
				}else{
			?>
					<h3 class="text-dark mt-3 mb-3 text-center">Followers (<?php echo sizeof($followers); ?>)</h3>
			<?php
				}
			}else{
			?>
				<h3 class="text-dark mt-3 mb-3 text-center"> USER NOT FOUND </h3>
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