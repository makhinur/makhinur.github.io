<?php 

	$redirect = "index.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['gender']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['avatar'])){

			require_once 'db.php';

			$redirect = "settings.php?error";
			
			$user = getUser($_POST['email']);

			if($user!=null || ($user==null && $user['id']!=null)){
				
				updateUserData($user['id'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['country'], $_POST['city'], $_POST['avatar']);

				$redirect = "profile.php?success";
			}
		}

	}

	header("Location: $redirect");

?> 