<?php 

	$redirect = "index.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['new_pass']) && isset($_POST['re_new_pass'])){

			require_once 'db.php';
			require_once 'user.php';

			$redirect = "changepassword.php?error";

			$user = getUser($CURRENT_USER['email']);
			
			if(($_POST['new_pass'] === $_POST['re_new_pass']) && ($_POST['old_pass']) === $user['password']){
				
				updatePassword($user['id'], $_POST['new_pass']);

				$redirect = "changepassword.php?success";
			}
		}

	}

	header("Location: $redirect");

?> 