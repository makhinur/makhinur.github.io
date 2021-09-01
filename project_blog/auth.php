<?php 

	$redirect = "index.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['email']) && isset($_POST['password'])){

			require_once 'db.php';

			$redirect = "login.php?error";

			$user = getUser($_POST['email']);

			if($user!=null && $user['id']!=null){

				session_start();

				$_SESSION['CURRENT_USER'] = $user;

				$redirect = "profile.php";

			}else{

			}

		}

	}

	header("Location: $redirect");

?>