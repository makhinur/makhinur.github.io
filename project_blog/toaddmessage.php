<?php 

	$redirect = "index.php";

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['message_text'])){

			require_once 'db.php';
			require_once 'user.php';

			if(ONLINE){

				addMessage($_POST['user_id'], $CURRENT_USER['id'],htmlspecialchars($_POST['message_text']));

				$redirect = "dialog.php?id=".$_POST['user_id'];
			}
		}

	}

	header("Location: $redirect");

?> 