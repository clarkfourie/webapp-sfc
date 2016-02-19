<?php

// Include site constants
include_once "base.php";

// email validation function
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
}

$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $confirmPasswordErr = $rsaidErr = "";
$firstname = $lastname = $email = $password = $confirmPassword = $rsaid = "";


// jQuery performs validation on the front end but it is a security risk and JS can be switched off.
// Escape user inputs for XSS security
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
  } else {
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $firstnameErr = "";
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
  } else {
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $lastnameErr = "";
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email address is required";
  } else {
    if (!isValidEmail($_POST["email"])) {
      $emailErr = "Email address is invalid";
    } else {
      $email = mysqli_real_escape_string($link, $_POST['email']);
      $emailErr = "";
    }
  }

  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirmPassword"])) {

    if(!preg_match("#[0-9]+#", $_POST["password"])) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#", $_POST["password"])) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#", $_POST["password"])) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }

    $password = mysqli_real_escape_string($link, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($link, $_POST['confirmPassword']);

    $passwordErr = $cpasswordErr = "";
  }
  elseif($password == "") {
    $cpasswordErr = "Please Check You've Entered Your Password and Password Confirmation!";
  } 

  if (empty($_POST["rsaid"])) {
    $rsaidErr = "RSA ID number is required";
  } else {
    $rsaid = mysqli_real_escape_string($link, $_POST["rsaid"]);
    $rsaidErr = "";
  }

}

// If there are no errors continue with insertion into the users table
if (($firstnameErr == "") && ($lastnameErr == "" ) && ($emailErr == "" ) && ($passwordErr == "" ) && ($confirmPasswordErr == "" ) && ($rsaidErr == "" )) {

  // Attempt insert query execution
  // Purposefully leave out id as it is set to AUTO_INCREMENT in the db
  $sql = "INSERT INTO users (firstname, lastname, email, password, confirmPassword, rsaid) VALUES ('$firstname', '$lastname', '$email', md5('$password'), md5('$confirmPassword'), '$rsaid')";

  if(mysqli_query($link, $sql)) {
      echo "Records added successfully.";
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
   
  // Close connection
  mysqli_close($link);

}
else { // Display errors 
  echo $firstnameErr . "<br>" . $lastnameErr . "<br>" . $emailErr . "<br>" . $passwordErr . "<br>" . $confirmPasswordErr . "<br>" . $rsaidErr;
}
 
?>