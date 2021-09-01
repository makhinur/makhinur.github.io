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
</head>
<body>
	<?php include_once 'navbar.php' ?>

	<div class="row mt-4">
		<div class="offset-3 col-6">
			<?php 

				if(isset($_GET['id']) && is_numeric($_GET['id'])){

					$answer = getAnswerById($_GET['id']);
					
					if($answer!=null && $answer['user_id']==$CURRENT_USER['id']){
			?>
						<form class="container col-12 bg-light p-4 rounded" action="tosaveanswer.php" method="post">
							<input type="hidden" name="id" value="<?php echo $answer['id']; ?>">
							<input type="hidden" name="tweet_id" value="<?php echo $answer['tweet_id']; ?>">
						  	<h3 class="text-dark mb-3 text-center">EDIT ANSWER</h3>
						   	<div class="form-group">
								<textarea class="form-control" name="answer" style="min-height: 200px;"><?php echo $answer['answer'] ?></textarea>
							</div>
								  
							<button type="submit" class="form-control btn btn-primary">Submit</button>
								 
						</form>

			<?php
					}else{
			?>
				<h1 class="text-center">ANSWER NOT FOUND</h1>
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