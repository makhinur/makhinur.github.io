<?php 

	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';
		require_once 'user.php';

		if(isset($_POST['tweet_id']) && is_numeric($_POST['tweet_id'])){

			deleteTweet($_POST['tweet_id']);

			header("Location:profile.php");

		}

	}else{

		header("Location:profile.php");
	
	}

?>