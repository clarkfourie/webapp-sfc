<?php

session_start();

// Include site constants and $link to database
include_once "base.php";

// variables from db to compare to user answer
$dbOpt1 = $dbOpt2 = $dbOpt3 = $dbOpt4 = "";

// update score logic:
// Step 1: compare the users answer to the db 
// Step 2: if they match update score

$id = 0; // define $id before it can be assigned

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_POST["id"])) {
		$id = $_POST["id"];
	}

	if($id > 0) { // a value must be sent through
		$sqlSelectQ = "SELECT * FROM questions WHERE questid='" . $_SESSION['sess_qid'] . "'";
		$questionQuery = mysqli_query($link, $sqlSelectQ); 
		if (mysqli_num_rows($questionQuery) != 0) {
			while ($row = mysqli_fetch_assoc($questionQuery)) {
				$dbOpt1 = $row['opt1'];
				$dbOpt2 = $row['opt2'];
				$dbOpt3 = $row['opt3'];
				$dbOpt4 = $row['opt4'];			
			}
		}

		$updateScore = 0; // if answer is correct (==1) update score to 1
		switch ($id) {
			case 1:
				if ($dbOpt1 == 1) 
					$updateScore = 1;
				break;
			case 2:
				if ($dbOpt2 == 1) 
					$updateScore = 1;
				break;
			case 3:
				if ($dbOpt3 == 1) 
					$updateScore = 1;
				break;
			case 4:
				if ($dbOpt4 == 1) 
					$updateScore = 1;
				break;
			default:
				$updateScore = 0;
				break;
		}

		echo $updateScore;
		echo $_SESSION['sess_uid'];
		echo $_SESSION['sess_qid'];


		// update the score in UQ table
		$sqlUpdateUQ = "UPDATE userquestion SET answered = 1, score = '" . $updateScore . "' WHERE uid = '" . $_SESSION['sess_uid'] . "' AND qid = '" . $_SESSION['sess_qid'] . "' LIMIT 1";
		$updateUQQuery = mysqli_query($link, $sqlUpdateUQ);

		// response to user
		echo "Your answer has been submitted.";

	} else {
		echo "No data received";
	}

} // $_POST

// print_r($_SESSION);

// print_r($_POST);

?>

