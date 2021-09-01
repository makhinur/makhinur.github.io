<?php 

	$redirect = "index.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['gender']) && isset($_POST['country']) && isset($_POST['city'])){

			require_once 'db.php';

			$redirect = "register.php?error";

			if($_POST['password']===$_POST['re_password']){

				$user = getUser($_POST['email']);

				if($user==null || ($user!=null && $user['id']==null)){
					addUser($_POST['email'], $_POST['password']);
					$added_user = getUser($_POST['email']);
					addUserData($added_user['id'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['country'], $_POST['city']);

					$redirect = "login.php?success";
				}
			}
		}else{
			$redirect = "register.php?error";
		}

	}

	header("Location: $redirect");

?> 