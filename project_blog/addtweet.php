<?php 
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){
?>

		<form class="container col-10 bg-light p-4 rounded" action="toaddtweet.php" method="post">
		  	<h3 class="text-dark mb-3 text-center">Add a tweet</h3>
		   	<div class="form-group">
				<textarea class="form-control" name="tweet"></textarea>
			</div>
				  
			<button type="submit" class="form-control btn btn-dark">Submit</button>		 
		</form>

<?php 
	}else{
		header("Location:login.php");
	} 
?>