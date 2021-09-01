<?php 

	$redirect = "profile.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['id']) && isset($_POST['answer'])){

			require_once 'db.php';
			require_once 'user.php';

			if(ONLINE){

				saveAnswer($_POST['id'],htmlspecialchars($_POST['answer']));

				$redirect = "readtweetanswers.php?id=".$_POST['tweet_id'];
				header("Location:$redirect");
			}
		}

	}

	header("Location: $redirect");

?> 