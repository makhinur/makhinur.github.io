<?php 

	$redirect = $_SERVER['HTTP_REFERER'];

	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';
		require_once 'user.php';

		if(isset($_POST['unfollow_user_id']) && is_numeric($_POST['unfollow_user_id'])){

			deleteFollow($CURRENT_USER['id'], $_POST['unfollow_user_id']);
			deleteFollower($_POST['unfollow_user_id'], $CURRENT_USER['id']);

			header("Location: $redirect");

		}

	}

	header("Location: $redirect");

?>