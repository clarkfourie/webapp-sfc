<?php
session_start();

// Include site constants and $link to database
include_once "base.php";

$score = 1;

if(isset($_POST["dataStr"]))
{
	$sqlUpdateUQ = "UPDATE userquestion SET score = 1 WHERE uid = '" . $_SESSION['sess_uid'] . "' AND qid = '" . $_SESSION['sess_qid'] . "' LIMIT 1";
	$updateUQQuery = mysqli_query($link, $sqlUpdateUQ);

} else {
	echo "no variable received";
}

print_r($_SESSION);

print_r($_POST);
// $sqlUpdate = "UPDATE "

// UPDATE Customers
// SET ContactName='Alfred Schmidt', City='Hamburg'
// WHERE CustomerName='Alfreds Futterkiste';

?>