<?php 

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		require_once 'db.php';

		if(isset($_POST['id']) && is_numeric($_POST['id'])){

			deleteUser($_POST['id']);
			deleteUserData($_POST['id']);
			deleteAllUserLikes($_POST['id']);
			deleteAllUserAnswers($_POST['id']);
			deleteAllUserTweets($_POST['id']);
			deleteAllUserFollows($_POST['id']);
			deleteAllUserFollowers($_POST['id']);
			deleteSent($_POST['id']);
			deleteReceived($_POST['id']);

			header("Location:index.php");

		}

	}else{

		header("Location:profile.php");

	}

?>