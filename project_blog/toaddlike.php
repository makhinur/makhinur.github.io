<?php 

	$redirect = "tweets.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['tweet_id']) && is_numeric($_POST['tweet_id'])){

			require_once 'db.php';
			require_once 'user.php';

			if(ONLINE){

				addLike($_POST['tweet_id'], $CURRENT_USER['id']);
				updateLikesCount($_POST['tweet_id'], ($_POST['like_count']+1));

				$redirect = "tweets.php?success";
			}
		}

	}

	header("Location: $redirect");

?> 