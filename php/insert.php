<?php

// Include site constants
include_once "base.php";

$email = "";
$emailErr = "";

// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['name']);
$surname = mysqli_real_escape_string($link, $_POST['surname']);

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
  	$email = mysqli_real_escape_string($link, $_POST['email']);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

$remail = mysqli_real_escape_string($link, $_POST['remail']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$rsaid = mysqli_real_escape_string($link, $_POST['rsaid']);


 
// Attempt insert query execution
// Purposefully leave out id as it is set to AUTO_INCREMENT in the db
$sql = "INSERT INTO users (username, password, name, surname, email, rsaid) VALUES ('removeme!', md5('$password'), '$name', '$surname', '$email', '$rsaid')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>