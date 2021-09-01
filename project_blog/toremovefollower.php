<?php 

	$redirect = $_SERVER['HTTP_REFERER'];

	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';
		require_once 'user.php';

		if(isset($_POST['remove_user_id']) && is_numeric($_POST['remove_user_id'])){

			deleteFollow($_POST['remove_user_id'], $CURRENT_USER['id']);
			deleteFollower($CURRENT_USER['id'], $_POST['remove_user_id']);

			header("Location: $redirect");

		}

	}

	header("Location: $redirect");

?>