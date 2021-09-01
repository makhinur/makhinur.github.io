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
					$user = getUserById($_GET['id']);
			?>
					<h3 class="text-center mb-3"><?php echo $user['email']; ?></h3>
					<div class="card bg-light">
						<ul class="list-group list-group-flush col-12 pb-4">
						<?php 
							$messages = getAllMessages();
							if($messages!=null){
								foreach($messages as $message){
									if($message['user_id']===$CURRENT_USER['id'] && $message['sender_id'] === $_GET['id']){
						?>					  
										<li class="list-group-item list-group-item-action list-group-item-primary col-5 m-2 border-0">
											<div>
									    		<b><?php echo $message['name']." ".$message['surname']?></b>
									    		<p style="font-size: 12px; margin-bottom: 7px;"><?php echo $message['sent_date']; ?></p>
									    	<div>
									    		<p><?php echo htmlspecialchars_decode($message['message_text']); ?></p>
									    </li>
						<?php 
									}
									if($message['user_id']===$_GET['id'] && $message['sender_id'] === $CURRENT_USER['id']){
						?>
								    	<div class="d-flex justify-content-end">
								    		<li class="list-group-item list-group-item-action list-group-item-success col-5 m-2 text-right border-0">
									    		<div>
										    		<b><?php echo $message['name']." ".$message['surname']?></b>
										    		<p style="font-size: 12px; margin-bottom: 7px;"><?php echo $message['sent_date']; ?></p>
										    	<div>
										    		<p><?php echo htmlspecialchars_decode($message['message_text']); ?></p>
										    </li>
										</div>
						<?php 
									}
								}
							}else{
						?>
								<h3 class="text-center">NO MESSAGES</h3>
						<?php
							}
						?> 
						</ul>
						<form class="bg-light p-4 rounded mb-3 text-center" action="toaddmessage.php" method="post">
							<label>Message <?php echo $user['email']; ?></label>
							<input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
						   	<div class="form-group">
								<textarea class="form-control" name="message_text"></textarea>
							</div>				  
							<button type="submit" class="form-control btn btn-dark">Send</button>		 
						</form>
					</div>
			<?php			
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