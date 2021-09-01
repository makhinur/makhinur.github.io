<!-- Practice 3 -->
<?php
	include "db.php";

	$totalCorrect=0;
	$analysis = "";

	for($i=0;$i<sizeof($questions);$i++) {
		if($_POST['q'.$i]===$questions[$i]['answer']){
			$totalCorrect++;
		} else {
			$analysis .= "<h3 style='color: red'>Q".($i+1).": ".$questions[$i]['question']."<br>Your answer: ".$_POST['q'.$i]."<br>Correct answer: ".$questions[$i]['answer']."</h3>";
		}
	}

	if($totalCorrect>=7){
		echo "<h2>Excellent!</h2>";
	}else if($totalCorrect<7 && $totalCorrect>=4){
		echo "<h2>Good!</h2>";
	}else{
		echo "<h2>Not enough scored to pass.</h2>";
	}
	echo "<h2>Total score: ".$totalCorrect." out of 8.</h2>";
	echo $analysis;
?>