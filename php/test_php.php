<?php

// Include site constants
include_once "constants.ini.php";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "sfc_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
// Purposefully leave out id & corresponding value as it is set to AUTO_INCREMENT
$sql = "INSERT INTO users (username, password, name, surname, email, rsaid) VALUES ('Batman', md5(1234), 'Bruce', 'Wayne', 'batman@mail.com', 9102055039080)";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>