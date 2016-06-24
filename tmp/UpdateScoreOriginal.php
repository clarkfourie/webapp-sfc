<?php

session_start();

// Include site constants and $link to database
include_once "base.php";

// variables from db to compare to user answer
$dbOpt1 = $dbOpt2 = $dbOpt3 = $dbOpt4 = "";

// update score logic:
// Step 1: compare the users answer to the db 
// Step 2: if they match update score

/*$json = file_get_contents('php://input');
$data = json_decode($json);

if(isset($data))*/
$id = $_GET['id'];
echo $id;

if ($id > 1) {
	echo "pick up";
} else {
	echo "Nothing";
}
    

// if (isset($_SESSION['sess_flg']))
//  if($id > 0) {	
// 	$sqlSelectQ = "SELECT * FROM questions WHERE questid='" . $_SESSION['sess_qid'] . "'";
// 	$questionQuery = mysqli_query($link, $sqlSelectQ); 
// 	if (mysqli_num_rows($questionQuery) != 0) {
// 		while ($row = mysqli_fetch_assoc($questionQuery)) {
// 			$dbOpt1 = $row['opt1'];
// 			$dbOpt2 = $row['opt2'];
// 			$dbOpt3 = $row['opt3'];
// 			$dbOpt4 = $row['opt4'];			
// 		}
// 	}

// 	$updateScore = 0; // if answer is correct set to 1
// 	switch ($id) {
// 		case 1:
// 			if ($dbOpt1 == 1) 
// 				$updateScore = 1;
// 			break;
// 		case 2:
// 			if ($dbOpt2 == 1) 
// 				$updateScore = 1;
// 			break;
// 		case 3:
// 			if ($dbOpt3 == 1) 
// 				$updateScore = 1;
// 			break;
// 		case 4:
// 			if ($dbOpt4 == 1) 
// 				$updateScore = 1;
// 			break;
// 		default:
// 			$updateScore = 0;
// 			break;
// 	}

// 	// update the score in UQ table
// 	$sqlUpdateUQ = "UPDATE userquestion SET score = '" . $updateScore . "' WHERE uid = '" . $_SESSION['sess_uid'] . "' AND qid = '" . $_SESSION['sess_qid'] . "' LIMIT 1";
// 	$updateUQQuery = mysqli_query($link, $sqlUpdateUQ);

// 	// USE WHEN YOU GET JQUERY POST TO WORK
// 	// $returned["reply"] = "success!"; 

// } else {
// 	// USE WHEN YOU GET JQUERY POST TO WORK
// 	// $returned["reply"] = "no data received";
// 	echo "No data received";
// }

print_r($_SESSION);

// print_r($_POST);

// print_r($_GET);

//echo json_encode($returned);

?>

