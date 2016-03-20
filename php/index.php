<?php
session_start();

// mid will check if there is an existing session
header("location: mid.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Spoilt for Choice</title>
<link rel="stylesheet" href="../css/index.css" type="text/css" />
<!-- hotlinking jQuery and jQuery validation plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="../js/validation.js"></script>
</head>
<body class="login">
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"> <img src="..\img\logo\sfc small.png" alt="logo img"> </div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
        <form   id="login_form" action="..\php\login.php" method="post">
          <div>
            <table border="0" style="border:none">
              <tr>
                <td ><input type="text" tabindex="1"  id="loginEmail" placeholder="Email" name="loginEmail" class="inputtext radius1" value=""></td>
                <td ><input type="password" tabindex="2" id="loginPasswd" placeholder="Password" name="loginPasswd" class="inputtext radius1" ></td>
                <td ><button class="fbbutton" name="loginBtn" id="loginBtn">Login</button></td>
              </tr>
              <tr>
                <td><label>
                    <input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"/>
                    <span style="color:#ccc;">Keep me logged in</span></label></td>
                <td><label><a href="" style="color:#ccc; text-decoration:none">forgot your password?</a></label></td>
              </tr>
            </table>

              <div id="errorContainerLogin" class="errorContainer">
                <ul/>
              </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="loginbox radius">
  <h2 style="color:#141823; text-align:center;">Welcome to Spoilt for Choice</h2>
  <div class="loginboxinner radius">
    <div class="loginheader">
      <h4 class="title">Answer questions to win cash.</h4>
    </div>
    <!--loginheader-->
    <div class="registrationForm">

      <form id="register" action="php/insert.php" method="post">
        <p>
          <input type="text" id="firstname" name="firstname" placeholder="First Name" value="" class="radius mini" />
          <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="" class="radius mini" />
        </p>
        <p>
          <input type="text" id="email" name="email" placeholder="Your Email" value="" class="radius" />
        </p>
        <p>
          <input type="password" id="password" name="password" placeholder="New Password" value="" class="radius" />
        </p>
        <p>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" value="" class="radius" />
        </p>
        <p>
          <input type="text" id="rsaid" name="rsaid" placeholder="RSA ID Number" value="" class="radius" />
        </p>
        <p>
          <button class="radius title" name="submit">Sign Up for SFC</button>
        </p>

    </div>
    <div id="errorContainerReg" class="errorContainer">
<!--  <span><?php echo $firstnameErr;?></span>
      <span><?php echo $lastnameErr;?></span>
      <span><?php echo $emailErr;?></span>
      <span><?php echo $passordErr;?></span>
      <span><?php echo $confirmPasswordErr;?></span>
      <span><?php echo $rsaidErr;?></span> -->
      <ul/>
    </div>
        
      </form>

    <!--registrationForm-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->
</body>
</html>


