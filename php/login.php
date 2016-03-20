<?php

// Include site constants
include_once "base.php";

$loginEmail = $loginPasswd = "";
$loginEmailErr = $loginPasswdErr = "";

if (isset($_POST["loginBtn"])) {

if (empty($_POST["loginEmail"])) {
    	$loginEmailErr = "Email is required";
  } else if (strlen($_POST["loginEmail"]) > 64) {
  		$loginEmailErr = "Email cannot contain more than 40 characters";
  } else {
  		$loginEmail = mysqli_real_escape_string($link, $_POST['loginEmail']);
    	$loginEmailErr = "OK";
}

if (empty($_POST["loginPasswd"])) {
    	$loginPasswdErr = "Password is required";
  } else if (strlen($_POST["loginPasswd"]) < 6 || strlen($_POST["loginPasswd"]) > 32) {
  		$loginPasswdErr = "Password cannot be more than 6 or less than 32 characters";
  } else {
  		$loginPasswd = mysqli_real_escape_string($link, $_POST['loginPasswd']);
    	$loginPasswdErr = "OK";
  }

} //POST end

if (($loginEmailErr == "OK") && ($loginPasswdErr == "OK")) {

	// Are the credentials listed in the db?
	$sql = "SELECT * FROM users WHERE email = '" . $loginEmail . "' AND password ='" . md5($loginPasswd) . "'"; 
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) != 0) {

		// fetch first name to display in main screen
		$dbName = "";
		while ($row = mysqli_fetch_assoc($query)) {
			$dbName = $row['firstname'];
		}

		session_start();
		$_SESSION['sess_user'] = $dbName;

		//echo $dbName;

		/* Redirect browser */
		header("Location: mid.php");

	} else {
		echo "The user name and password does not exist";
	}

} else {
	echo $loginEmailErr . "<br>" . $loginPasswdErr;
}

?>