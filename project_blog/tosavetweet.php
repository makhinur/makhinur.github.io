<?php 

	$redirect = "index.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['id']) && isset($_POST['tweet'])){

			require_once 'db.php';
			require_once 'user.php';

			if(ONLINE){

				saveTweet($_POST['id'], $CURRENT_USER['id'],htmlspecialchars($_POST['tweet']));

				$redirect = "profile.php?success";
			}
		}

	}

	header("Location: $redirect");

?> 