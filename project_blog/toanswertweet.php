<?php 

	$redirect = "readtweetanswers.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['answer']) && isset($_POST['tweet_id']) && is_numeric($_POST['tweet_id'])){

			require_once 'db.php';
			require_once 'user.php';

			if(ONLINE){

				addAnswer($_POST['tweet_id'], $CURRENT_USER['id'], htmlspecialchars($_POST['answer']));

				$redirect = "readtweetanswers.php?id=".$_POST['tweet_id'];
			}
		}

	}

	header("Location: $redirect");

?> 