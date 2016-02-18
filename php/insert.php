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
// Escape user inputs for security
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
  } else {
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
  } else {
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email address is required";
  } else {
    if (!isValidEmail($_POST["email"])) {
      $emailErr = "Email address is invalid";
    } else {
      $email = mysqli_real_escape_string($link, $_POST['email']);
    }
  }

  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirmPassword"])) {

    $password = mysqli_real_escape_string($link, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($link, $_POST['confirmPassword']);

    if(!preg_match("#[0-9]+#", $password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#", $password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#", $password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
  }
  elseif(!empty($password)) {
    $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
  }

  if (empty($_POST["rsaid"])) {
    $rsaidErr = "RSA ID number is required";
  } else {
    $rsaid = mysqli_real_escape_string($link, $_POST["rsaid"]);
  }

}

echo $firstname . " : " . $firstnameErr;


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



?>