<?php
session_start();

// Include site constants and $link to database
include_once "base.php";

// variables to compare to user answer
$dbOpt1 = $dbOpt2 = $dbOpt3 = $dbOpt4 = "";

// update score logic:
// Step 1: compare the users answer to the db 
// Step 2: if correct update score

if(isset($_POST["data"]))
{	
	$sqlSelectQ = "SELECT * FROM questions WHERE questid='" . $_SESSION['sess_qid'] . "'";
	$questionQuery = mysqli_query($link, $sqlSelectQ); 
	if (mysqli_num_rows($questionQuery) != 0) {

		$dbOpt1 = $row['opt1'];
		$dbOpt1 = $row['opt2'];
		$dbOpt1 = $row['opt3'];
		$dbOpt1 = $row['opt4'];
	}

	$updateScore = 0; // if answer is correct set to 1
	switch ($_POST["data"]) {
		case 1:
			if ($dbOpt1 == 1) 
				$updateScore = 1;
			break;
		case 2:
			if ($dbOpt1 == 2) 
				$updateScore = 1;
			break;
		case 3:
			if ($dbOpt1 == 3) 
				$updateScore = 1;
			break;
		case 4:
			if ($dbOpt1 == 4) 
				$updateScore = 1;
			break;
		default:
			$updateScore = 0;
			break;
	}

	// update the score in UQ table
	$sqlUpdateUQ = "UPDATE userquestion SET score = '" . $updateScore . "' WHERE uid = '" . $_SESSION['sess_uid'] . "' AND qid = '" . $_SESSION['sess_qid'] . "' LIMIT 1";
	$updateUQQuery = mysqli_query($link, $sqlUpdateUQ);

} else {
	echo "no variable received";
}

print_r($_SESSION);

print_r($_POST);


?>