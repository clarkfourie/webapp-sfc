<?php
session_start();

// print_r($_SESSION);

// $flag = 0;

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// 	if (isset($_POST["id"])) {
// 			$flag = $_POST["id"];
// 		}
		
// 	if ($flag) {
		if(!isset($_SESSION["sess_user"])){
			header("location: index.php");
		} else {
			header("location: mainContainer.php");
		}	
	// }

// }

?>