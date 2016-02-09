<?php

    /* base.php to be included in all other php files. 

        1) sets basic php
        2) start/resumes sesssion
        3) includes constants
        4) connects to db
    */  

    // Set the error reporting level
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
 
    // Start a PHP session
    session_start();
 
    // Include site constants
    include_once "constants.ini.php";

    // Attempt SQL server connection
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>