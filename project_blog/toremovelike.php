<?php 

	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';
		require_once 'user.php';

		if(isset($_POST['tweet_id']) && is_numeric($_POST['tweet_id'])){

			deleteLike($_POST['tweet_id'], $CURRENT_USER['id']);
			updateLikesCount($_POST['tweet_id'], ($_POST['like_count']-1));

			header("Location:tweets.php");

		}

	}else{

		header("Location:tweets.php");
	
	}

?>