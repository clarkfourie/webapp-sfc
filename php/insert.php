<?php

// Include site constants and $link to database
include_once "base.php";

// form specific validation function
function isValidEmail($_email) {
    return filter_var($_email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $_email);
}

// Variable to contain posts from html and errors
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $rsaidErr = $confirmErr = "";
$firstname = $lastname = $email = $password = $confirmPassword = $rsaid = "";

// jQuery performs validation on the front end but it is a security risk if JS is switched off.
// Escape user inputs for XSS security
if (isset($_POST["submit"])) {

  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
  } else if (strlen($_POST["firstname"]) > 40) {
    $firstnameErr = "First name cannot be more than 40 characters.";
  } else {
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $firstnameErr = "OK";
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
  } else if (strlen($_POST["lastname"]) > 40){
    $lastnameErr = "Last name cannot contain more than 40 characters.";
  } else {
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $lastnameErr = "OK";
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email address is required";
  } else if (!isValidEmail($_POST["email"])) {
    $emailErr = "Email address is invalid";
  } else if (strlen($_POST["email"]) > 64) {
    $emailErr = "Email cannot contain more than 64 characters";
  } else {
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $emailErr = "OK";
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Please complete the password field";
  } else if (!empty($_POST["password"]) && $_POST["password"] != $_POST["confirmPassword"]) {
    $passwordErr = "Passwords do not match!";
  } else {
    if (strlen($_POST["password"]) < 6) {
      $passwordErr = "Your Password Must Contain At Least 6 Characters!";
    } else if (strlen($_POST["password"]) > 32) {
      $passwordErr = "Your Password cannot contain more than 32 characters.";
    } else if (!preg_match("#[0-9]+#", $_POST["password"])) {
      $passwordErr = "Your Password Must Contain At Least 1 Number!";
    } else if (!preg_match("#[A-Z]+#", $_POST["password"])) {
      $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    } else if (!preg_match("#[a-z]+#", $_POST["password"])) {
      $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
      $password = mysqli_real_escape_string($link, $_POST["password"]);
      $confirmPassword = mysqli_real_escape_string($link, $_POST["confirmPassword"]);
      $passwordErr = "OK";
    }
  }

  if (empty($_POST["rsaid"])) {
    $rsaidErr = "RSA ID number is required";
  } else if (!preg_match("/^([0-9]){2}([0-1][0-9])([0-3][0-9])([0-9]){4}([0-1])([0-9]){2}?$/", $_POST["rsaid"])) {
    $rsaidErr = "RSA ID number is invalid.";
  } else {
    $rsaid = mysqli_real_escape_string($link, $_POST["rsaid"]);
    $rsaidErr = "OK";
  }

} // POST end

// If there are no errors continue with insertion into the users table
if (($firstnameErr == "OK") && ($lastnameErr == "OK") && ($emailErr == "OK") && ($passwordErr == "OK") && ($rsaidErr == "OK")) {

  // Is the email provided unique?
  $sql = "SELECT * FROM users WHERE email='$email'";
  $checkEmail = mysqli_query($link, $sql);
  if(mysqli_num_rows($checkEmail) > 0) {
      echo "This email already exists in the database";
  } else {
    // Insert into user table sql string
    // Purposefully leave out id as it is set to AUTO_INCREMENT in the db
    $sql = "INSERT INTO users (firstname, lastname, email, password, confirmPassword, rsaid) VALUES ('$firstname', '$lastname', '$email', md5('$password'), md5('$confirmPassword'), '$rsaid')";

    if (mysqli_query($link, $sql)) { // users insert successful
      echo "Records added successfully.";

      $to = $email;
      $subject = 'SFC user confirmation';
      
      $message = 'Dear ' . $firstname;
      $message .= '. Welcome to SFC!'; 

      $headers = 'From: welcom@sfc.com';
       
      // Sending email
      if (mail($to,$subject,$message,$headers)) {
          echo 'Your mail has been sent successfully.';

          // load main.html
          $doc = new DOMDocument();
          $doc->loadHTMLFile("C:/xampp/htdocs/sfc/html/main.html");
          echo $doc->saveHTML();

      } else {
          echo 'Unable to send email. Please try again.';
      }

    } else {
      echo 'User could not be added to the database. Reason: ' . mysqli_error($link);
    }
  }
   
  // Close connection
  mysqli_close($link);

}
else { // Display errors 
  echo $firstnameErr . "<br>" . $lastnameErr . "<br>" . $emailErr . "<br>" . $passwordErr . "<br>" . $rsaidErr;
}
 
?>