<?php

// Include site constants
include_once "base.php";

// form specific validation function
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
}

$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $rsaidErr = $confirmErr = "";
$firstname = $lastname = $email = $password = $confirmPassword = $rsaid = "";

// jQuery performs validation on the front end but it is a security risk and JS can be switched off.
// Escape user inputs for XSS security
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
  } else {
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $firstnameErr = "OK";
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
  } else {
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $lastnameErr = "OK";
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email address is required";
  } else {
    if (!isValidEmail($_POST["email"])) {
      $emailErr = "Email address is invalid";
    } else {
      $email = mysqli_real_escape_string($link, $_POST['email']);
      $emailErr = "OK";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Please complete the password field";
  } elseif (!empty($_POST["password"]) && $_POST["password"] != $_POST["confirmPassword"]) {
    $passwordErr = "Passwords do not match!";
  } else {
    if (strlen($_POST["password"]) < '6') {
      $passwordErr = "Your Password Must Contain At Least 6 Characters!";
    } elseif (!preg_match("#[0-9]+#", $_POST["password"])) {
      $passwordErr = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("#[A-Z]+#", $_POST["password"])) {
      $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("#[a-z]+#", $_POST["password"])) {
      $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
      $password = mysqli_real_escape_string($link, $_POST["password"]);
      $confirmPassword = mysqli_real_escape_string($link, $_POST["confirmPassword"]);
      $passwordErr = "OK";
    }
  }

  if (empty($_POST["rsaid"])) {
    $rsaidErr = "RSA ID number is required";
  } elseif (!preg_match("/^([0-9]){2}([0-1][0-9])([0-3][0-9])([0-9]){4}([0-1])([0-9]){2}?$/", $_POST["rsaid"])) {
    $rsaidErr = "RSA ID number is invalid.";
  } else {
    $rsaid = mysqli_real_escape_string($link, $_POST["rsaid"]);
    $rsaidErr = "OK";
  }

} // POST

// If there are no errors continue with insertion into the users table
if (($firstnameErr == "OK") && ($lastnameErr == "OK" ) && ($emailErr == "OK" ) && ($passwordErr == "OK" ) && ($rsaidErr == "OK" )) {

  // insert into user table sql string
  // Purposefully leave out id as it is set to AUTO_INCREMENT in the db
  $sql = "INSERT INTO users (firstname, lastname, email, password, confirmPassword, rsaid) VALUES ('$firstname', '$lastname', '$email', md5('$password'), md5('$confirmPassword'), '$rsaid')";

  if(mysqli_query($link, $sql)) { // users insert successful
    echo "Records added successfully.";

    $to = $email;
    $subject = 'SFC user confirmation';
    $message = 'Dear ' . $firstname . '\n\nWelcome to SFC!' ; 
    $headers = 'From: munged@gmail.com';
     
    // Sending email
    if(mail($to,$subject,$message,$headers,"-f your@email.here")){
        echo 'Your mail has been sent successfully.';
    } else{
        echo 'Unable to send email. Please try again.';
    }

  } else {
    echo 'User could not be added to the database. Reason: ' . mysqli_error($link);
  }
   
  // Close connection
  mysqli_close($link);

}
else { // Display errors 
  echo $firstnameErr . "<br>" . $lastnameErr . "<br>" . $emailErr . "<br>" . $passwordErr . "<br>" . $rsaidErr;
}
 
?>