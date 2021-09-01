<?php 

	$redirect = $_SERVER['HTTP_REFERER'];

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['follow_user_id']) && is_numeric($_POST['follow_user_id'])){

			require_once 'db.php';
			require_once 'user.php';

			if(ONLINE){

				addFollowing($CURRENT_USER['id'], $_POST['follow_user_id']);
				addFollower($_POST['follow_user_id'], $CURRENT_USER['id']);

				header("Location: $redirect");
			}
		}
	}

	header("Location: $redirect");

?>