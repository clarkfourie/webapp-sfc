<?php
session_start();

// print_r($_SESSION);

if(!isset($_SESSION["sess_user"])){
	header("location: index.php");
} else {
	header("location: main.php");
}

?>