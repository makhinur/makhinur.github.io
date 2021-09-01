<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="lab_result.php" method="post">
		<table>
			<tr>
				<td>Student ID</td>
				<td><input type="text" name="student_id"></td>
			</tr>
				<td>Subject</td>
				<td><select name="subject">
					<?php
						include "lab_db.php";
						for($i=0;$i<sizeof($subjects);$i++){
					?>
					<option>
						<?php echo $subjects[$i]['subject_name']?>
					</option>
					<?php
						}
					?>
				</select></td>
			</tr>
				<td>Subject Credits</td>
				<td><input type="text" name="subject_credits"></td>
			<tr>
				
			</tr>
			<tr>
				<td><button>Submit</button></td>
			</tr>
		</table>
	</form>

</body>
</html>