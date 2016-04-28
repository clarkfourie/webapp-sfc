<?php
session_start();

// Include site constants and $link to database
include_once "base.php";

$errArr = array();

$rand = 0;

// Variables to be displayed in html
$dbQID = $dbQuestion = "";
$dbAns1 = $dbAns2 = $dbAns3 = $dbAns4 = "";
$dbOpt = $dbOpt2 = $dbOpt3 = $dbOpt4 = "";
$dbSponsor1 = $dbSponsor2 = $dbSponsor3 = $dbSponsor4 = "";
$dbImg1 = $dbImg2 = $dbImg3 = $dbImg4 = "";

// userquestion logic: 
// Step 1: select a random question from the questions table, if there is not a corresponding question, select again
// Step 2: query the userquestions table for the current session user to see if this question has already been asked
// Step 3: if the rows returned are > 0 select a new question else write the uid and the qid to the userquestion table

$flag = 1; // Dual purpose: 1) ends looping 2) sets score equal to 0 in UQ table
$counter = 0; // to prevent infinite loop

while ($flag == 1) { // will infinitely loop if a user has all questions listed in his db - prevent with $counter
	$rand = mt_rand(1,3);
	$counter++; 
	if ($counter > 10) { // break the while once counter reaches 10 to prevent infinte loop - FIND A BETTER SOLUTION!!!
		break;
	}
	$sqlSelectQ = "SELECT * FROM questions WHERE questid='" . $rand . "'";
	$questionQuery = mysqli_query($link, $sqlSelectQ); 
	if (mysqli_num_rows($questionQuery) != 0) { // $rand id exists in Q table
		$sqlSelectUQ = "SELECT * FROM userquestion WHERE qid='" . $rand . "'";
		$userquestionQuery = mysqli_query($link, $sqlSelectUQ);
		if (mysqli_num_rows($userquestionQuery) == 0) { // Question is not already in UQ table
			
			$flag = 0; // prevent further looping

			while ($row = mysqli_fetch_assoc($questionQuery)) { // populate question variables from Q table
					
					$_SESSION['sess_qid'] = $rand; // set qid to be used in UpdateScore.php

					$dbQID = $rand; // similar to qid in Q table
					$dbQuestion = $row['question'];

					// descriptive answer for display purposes
					$dbAns1 = $row['ans1'];
					$dbAns2 = $row['ans2'];
					$dbAns3 = $row['ans3'];
					$dbAns4 = $row['ans4'];

					// indicates which answer is correct with a 1
					$dbOpt1 = $row['opt1'];
					$dbOpt2 = $row['opt2'];
					$dbOpt3 = $row['opt3'];
					$dbOpt4 = $row['opt4'];

					// user answer get updated by a flag - PERHAPS REMOVE FROM DB!!!
					$dbFlg1 = $row['flg1'];
					$dbFlg2 = $row['flg2'];
					$dbFlg3 = $row['flg3'];
					$dbFlg4 = $row['flg4'];

					$dbSponsor1 = $row['sponsor1'];
					$dbSponsor2 = $row['sponsor2'];
					$dbSponsor3 = $row['sponsor3'];
					$dbSponsor4 = $row['sponsor4'];

					$dbImg1 = $row['img1'];
					$dbImg2 = $row['img2'];
					$dbImg3 = $row['img3'];
					$dbImg4 = $row['img4'];
			}

			// Insert details in to UQ - NB score is set to zero, ammend if questions are correct
			$sqlInsertUQ = "INSERT INTO userquestion (uid, qid, score) VALUES ('" . $_SESSION['sess_uid'] . "', '" . $dbQID ."', '" . $flag . "' )";
			$insertQuery = mysqli_query($link, $sqlInsertUQ);
		} else {
			array_push($errArr, "question is already in UQ table rand=" . $rand);
		}
	} else {
		array_push($errArr, "random number generated with no corresponding Q table rand='" . $rand);
	}
}

if ($counter > 10)
	print_r($errArr);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/main.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>

	<h2>Welcome, <?=$_SESSION['sess_user'];?>! <a href="logout.php">Logout</a></h2>

	<p>random: <?php echo $rand; ?></p> 
	<p>Questid: <?php echo $dbQID; ?></p>

	<div id="imgContainer">

		<table name="imgTable" align="center">
			<tr>
				<p align="center"><?php echo $dbQID; ?></p>
				<p align="center"><?php echo $dbQuestion; ?></p>
			</tr>
			<tr>
			  	<td>
		    	<div class="block1">
				    <img src="<?php echo $dbImg1?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor1; ?></h4>
					         <p><?php echo $dbAns1; ?></p>
					    </div>
					</div>
			    </td>
			    <td> 	
			    	<div class="block2">
					    <img src="<?php echo $dbImg2?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor2; ?></h4>
					         <p><?php echo $dbAns2; ?></p>
					    </div>
					</div>

			    </td> 
			</tr>
			<tr>
			    <td>
			    	<div class="block3">
					    <img src="<?php echo $dbImg3?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor3; ?></h4>
					         <p><?php echo $dbAns3; ?></p>
					    </div>
					</div>		    	
				</td>
				<td>
			    	<div class="block4">
					    <img src="<?php echo $dbImg4?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor4; ?></h4>
					         <p><?php echo $dbAns4; ?></p>
					    </div>
					</div>

				</td> 
			</tr>
		</table>		

	</div>

	<div id="buttonDiv">
		<button class="radius title" name="submit" id="ansSubmit">Send request</button>
	</div>

</body>
</html>
