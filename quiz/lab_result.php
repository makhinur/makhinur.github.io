<?php
	
	include "lab_db.php";

	$c = $_POST['subject_credits'];
	$mark = "";
	if($c>=90){
		$mark = "A";
	}else if($c<90 && $c>=70){
		$mark = "B";
	}else if($c<70 && $c>=60){
		$mark = "C";
	}else if($c<60 && $c>=50){
		$mark = "D";
	}else{
		$mark = "F";
	}

	$found = false;
	$name = "";
	$surname = "";

	for($i=0;$i<sizeof($students);$i++){
		if($_POST['student_id']===$students[$i]['student_id']){
			$name = $students[$i]['student_name'];
			$surname = $students[$i]['student_surname'];
			$found =true;
		}
	}

	if($found){
		echo "<h2>Welcome, ".$name." ".$surname."</h2>";
	}else{
		echo "<h2>Student not found</h2>";
	}

	for($i=0;$i<sizeof($subjects);$i++){
		if($_POST['subject']===$subjects[$i]['subject_name']){
			echo "<h2>Subject: ".$subjects[$i]['subject_name']."</h2>";
			echo "<h2>Mark: ".$mark."</h2>";
			if($mark=="F"){
				echo "<h2 style='color:red'>Subject is failed. Cost of retake is ".$subjects[$i]['subject_price']." Galleons.</h2>"; 
			} else {
				echo "<h2 style='color:#3fe057;'>Subject successfully passed!</h2>";
			}
		}
	}

?>