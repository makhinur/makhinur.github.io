<?php 

	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';
		require_once 'user.php';

		if(isset($_POST['answer_id']) && is_numeric($_POST['answer_id'])){

			deleteAnswer($_POST['answer_id']);

			$redirect = "readtweetanswers.php?id=".$_POST['tweet_id'];

			header("Location:$redirect");

		}

	}else{

		header("Location:$redirect");
	
	}

?>