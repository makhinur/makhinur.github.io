<!-- Practice 1 -->
<!-- <?php
	$name = $_GET['client_name'];
	$surname = $_GET['client_surname'];
	$food = $_GET['food_choice'];
	echo "<h1>".$name." ".$surname." ordered ".$food."</h1>"
?> -->


<!-- Practice 2 -->
<?php
	$users = array();
	$users[0]['username'] = "admin";
	$users[0]['password'] = "qweqwe";
	$users[1]['username'] = "mariya";
	$users[1]['password'] = "123";
	$users[2]['username'] = "magdalena";
	$users[2]['password'] = "ooo";

	$u = $_GET['username'];
	$pass = $_GET['password'];
	$name = "";

	for($i=0;$i<sizeof($users);$i++){
		if($users[$i]['username']===$u && $users[$i]['password']===$pass){
			$name = $user[$i]["username"];
			header("Location:profile.php");
			break;
		}else{
			header("Location:index.php");
		}
	}
?>
