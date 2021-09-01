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

				$follows = getAllFollowing($_GET['id']); 
				if($follows!=null){
			?>
				<h3 class="text-dark mt-3 mb-3 text-center"> Following (<?php echo sizeof($follows);?>)</h3>
			<?php
					foreach($follows as $follow){
			?>
						<div class="jumbotron">
						  <div class="row">
						  	<div class="col-2 m-0 p-0 d-flex justify-content-center">
						  		<img class="rounded-circle" src="<?php echo $follow['avatar'] ?>" style="height: 100px; width: 100px;">
						  	</div>
						  	<div class="col-10">
						  		<div class="row mb-2">
						  			<div class="col-7">
								  		<a class="h3 text-dark d-block" href="<?php 
								  							if($CURRENT_USER['id']===$follow['follow_id']){
								  								echo "profile.php";
								  							}else{
								  								?>
								  								userinfo.php?id=<?php echo $follow['follow_id']; } ?>">
								  			<?php echo $follow['name']." ".$follow['surname'] ?></a>
								  		<a class="h5 text-dark d-block" href="<?php 
								  							if($CURRENT_USER['id']===$follow['follow_id']){
								  								echo "profile.php";
								  							}else{
								  								?>
								  								userinfo.php?id=<?php echo $follow['follow_id']; } ?>">
								  			<?php echo $follow['email']; ?></a>
								  	</div>
								  	<?php
								  		if($CURRENT_USER['id']!=$follow['follow_id']){

								  			$isfollowing = false;
									  		$myfollows = getAllFollowing($CURRENT_USER['id']);

									  		if($myfollows!=null){
									  			foreach ($myfollows as $myfollow) {
									  				if($follow['follow_id']===$myfollow['follow_id'] && $CURRENT_USER['id']===$myfollow['user_id']){
									  					$isfollowing = true;
									  				}
												}
								  			}
									  		if($isfollowing){
									?>
											  	<form class="col-5" action="tounfollow.php" method="post">
												  	<input type="hidden" name="unfollow_user_id" value="<?php echo $follow['follow_id']; ?>">
													<button class="btn btn-outline-primary rounded-pill offset-2 col-10 btn-lg" role="button">Unfollow</button>
											  	</form>
									<?php  
											}else{
									?>
											  	<form class="col-5" action="tofollow.php" method="post">
											  		<input type="hidden" name="follow_user_id" value="<?php echo $follow['follow_id']; ?>">
													<button class="btn btn-outline-success rounded-pill offset-2 col-10 btn-lg" role="button">Follow</button>
											  	</form>
									<?php 
											}
										}
									?>
									
						  		</div>
						  		<div>
						  			<hr class="my-4">
						  		</div>
						  	</div>
						  </div>
						</div>
			<?php  
						$users = getAllUsers();
						if($users!=null){

			?>
							<h3 class="text-dark mt-3 mb-3"> People you might know </h3>
			<?php 
							foreach ($users as $user) {
								if($user['id']!=$follow['follow_id']){
			?>
									<div class="jumbotron">
									  <div class="row">
									  	<div class="col-2 m-0 p-0 d-flex justify-content-center">
									  		<img class="rounded-circle" src="<?php echo $user['avatar'] ?>" style="height: 100px; width: 100px;">
									  	</div>
									  	<div class="col-9">
									  		<div class="row mb-2">
									  			<div class="col-7">
											  		<h3><?php echo $user['name']." ".$follow['surname'] ?></h3>
											  		<h5><?php echo $user['email']; ?></h5>
											  	</div>
											  	<form class="col-5" action="tounfollow.php" method="post">
												  	<div>
												  		<input type="hidden" name="unfollow_user_id" value="<?php echo $user['follow_id']; ?>">
													  	<button class="btn btn-outline-primary rounded-pill offset-2 col-10 btn-lg" href="#" role="button">Unfollow</button>
													</div>	
											  	</form>
												
									  		</div>
									  		<div>
									  			<hr class="my-4">
									  		</div>
									  	</div>
									  </div>
									</div>
			<?php
								}
							}
						}
					} 
				} else {
			?>
					<h3 class="text-dark mt-3 mb-3 text-center"> <?php echo sizeof($follows) ?> Following</h3>
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