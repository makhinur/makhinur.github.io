<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<!-- Practice 1 -->
	<!-- <form action="result.php" method="get">
		<table>
			<tr>
				<td>Client name</td>
				<td><input type="text" name="client_name"></td>
			</tr>
			<tr>
				<td>Client surname</td>
				<td><input type="text" name="client_surname"></td>
			</tr>
			<tr>
				<td>Food</td>
				<td><select name="food_choice">
					<option>Pizza - 1100 KZT</option> 
					<option>Chiken - 1200 KZT</option> 
					<option>Manty - 700 KZT</option> 
					<option>Lagman - 800 KZT</option> 
				</select></td>
			</tr>
			<tr>
				<td><button>ORDER FOOD</button></td>
			</tr>
		</table>
	</form> -->


	<!-- Practice 2 -->
	<!-- <form action="result.php" method="get">
		<table>
			<tr>
				<td>USERNAME:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>PASSWORD:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><button>SIGN IN</button></td>
			</tr>
		</table>
	</form> -->


	<!-- Practice 3 -->
	<form action="result2.php" method="post">
		<?php
			include "db.php";
			echo "<h2 style='text-align: center;'>Quiz Time</h2>";
			for($i=0;$i<sizeof($questions);$i++){
				echo "<h3> Q".($i+1).": ".$questions[$i]['question']."</h3>";
				echo "<input type='radio' name='q".$i."' value='".$questions[$i]['var_1']."'>".$questions[$i]['var_1']."<br>";
				echo "<input type='radio' name='q".$i."' value='".$questions[$i]['var_2']."'>".$questions[$i]['var_2']."<br>";
				echo "<input type='radio' name='q".$i."' value='".$questions[$i]['var_3']."'>".$questions[$i]['var_3']."<br>";
				echo "<input type='radio' name='q".$i."' value='".$questions[$i]['var_4']."'>".$questions[$i]['var_4']."<br>";
			}
		?>
		<br><button>Submit</button>
	</form>
</body>
</html>