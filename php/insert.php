<?php

// Include site constants
include_once "base.php";

//Function to determine whether a valid email format is used
function isValidEmail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Escape user inputs for security
$firstname = mysqli_real_escape_string($link, $_POST['firstname']);
$lastname = mysqli_real_escape_string($link, $_POST['lastname']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$confirmPassword = mysqli_real_escape_string($link, $_POST['confirmPassword']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$rsaid = mysqli_real_escape_string($link, $_POST['rsaid']);

//Validation:
//jQuery form validation will prevent fields from being empty

//Confirms email is in valid format
if (!isValidEmail($email)) 
  	echo "Invalid email format";


  // if (empty($_POST["email"])) {
  //   $emailErr = "Email is required";
  // } else {
  // 	$email = mysqli_real_escape_string($link, $_POST['email']);
  //   // check if e-mail address is well-formed
  //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //     $emailErr = "Invalid email format"; 
  //   }
  // }

/*
 
// Attempt insert query execution
// Purposefully leave out id as it is set to AUTO_INCREMENT in the db
$sql = "INSERT INTO users (username, password, name, surname, email, rsaid) VALUES ('removeme!', md5('$password'), '$name', '$surname', '$email', '$rsaid')";

if(mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

*/
?>