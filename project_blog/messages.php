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
	<?php 
		include_once 'navbar.php'; 

		$diologs = getConnections($CURRENT_USER['id']);
	?>

	<div class="row mt-4">
		<div class="offset-3 col-6">
			<h3 class="text-center mt-3 mb-4">Diologs (<?php echo sizeof($diologs); ?>)</h3>
			<div class="card">
				<ul class="list-group list-group-flush">
				<?php 
					if($diologs!=null){
						for($i=0; $i<sizeof($diologs);$i++){
							$ud = getUserData($diologs[$i]);
							if($ud!=null){
				?>					  
								<a class="list-group-item list-group-item-action list-group-item-light text-dark d-flex" href="dialog.php?id=<?php echo $ud['user_id']; ?>">
									<img class="rounded-circle mr-4" src="<?php echo $ud['avatar'] ?>" style="height: 80px; width: 80px;">
							    	<h5 class="mt-3"><?php echo $ud['name']." ".$ud['surname'];?></h5>
								</a>
				<?php 
							}
						}	
					}else{
				?>
						<h4 class="text-center m-3">NO ACTIVE DIOLOGS</h4>
				<?php
					}
				?> 
				</ul>
			</div>
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