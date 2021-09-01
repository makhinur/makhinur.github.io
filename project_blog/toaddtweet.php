<?php 

	$redirect = "index.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['tweet'])){

			require_once 'db.php';
			require_once 'user.php';

			if(ONLINE){

				addTweet($CURRENT_USER['id'],htmlspecialchars($_POST['tweet']), "true", 0);

				$redirect = "tweets.php?success";
			}
		}

	}

	header("Location: $redirect");

?> 