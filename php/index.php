<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Spoilt for Choice</title>
<link rel="stylesheet" href="../css/index.css" type="text/css" />
<!-- hotlink jQuery and jQuery validation plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="../js/index.js"></script>
</head>
<body class="login">

  <!-- ************************************************** TOP BAR ************************************************** -->

<div id="top-bar" class="knockout-around">
    <div id="top-bar-left" >
      <div class="soft-embossed"><img class="image-wrap" src="..\img\logo\SFC shadow small.png" alt="logo img"></div>
      <span class="bot-left">Welcome to Spoilt for Choice.</span>
    </div>
    <div id="top-bar-right">
      <div class="registrationForm">
        <form   id="login_form" action="login.php" method="post">
          <div>
            <table border="0" style="border:none">
              <tr>
                <td ><input type="text" tabindex="1"  id="loginEmail" placeholder="Email" name="loginEmail" class="inputtext radius1" value=""></td>
                <td ><input type="password" tabindex="2" id="loginPasswd" placeholder="Password" name="loginPasswd" class="inputtext radius1" ></td>
              </tr>
              <tr>
                <td><label>
                    <input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"/>
                    <span style="color:#4F2F4F; font-size:18px; padding-top: 10px;">Keep me logged in</span></label></td>
                <td><label><a href="" style="color:#4F2F4F; font-size:18px; text-decoration:none">Forgot your password?</a></label></td>
              </tr>
              <tr>
                <td colspan="2"><button class="login-button" name="loginBtn" id="loginBtn">Login</button></td>
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

  <!-- ************************************************** TOP BAR ************************************************** -->
<div class="empty-space">
</div>
  <!-- ************************************************** CONTENT ************************************************** -->

<div id="content" class="bottom-to-top">
  <p> Spoilt for choice is your way of exploring brands and winning prizes while doing so. </p>
  <p> All you have to do is answer 5 questions correct and you will receive an entry into the lucky draw. </p>
  <p> Each week entries from the lucky draw will be selected at random to win amazing prizes as well as the grand prize of  </p>

  <div><button class="login-button" id="reg-btn">Register</button></div>
</div>

  <!-- ************************************************** CONTENT ************************************************** -->
<div class="empty-space">
</div>
  <!-- ************************************************** REGISTR ************************************************** -->

    <div class="top-to-bottom" id="reg-div">
      <form id="register" action="..\php\insert.php" method="post">
        <p>
          <input type="text" id="firstname" name="firstname" placeholder="First Name" value="" class="inputtext" />
          <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="" class="inputtext" />
        </p>
        <p>
          <input type="text" id="email" name="email" placeholder="Your Email" value="" class="inputtext" />
        </p>
        <p>
          <input type="password" id="password" name="password" placeholder="New Password" value="" class="inputtext" />
        </p>
        <p>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" value="" class="inputtext" />
        </p>
        <p>
          <input type="text" id="rsaid" name="rsaid" placeholder="RSA ID Number" value="" class="inputtext" />
        </p>
        <pre>

<button class="reg-button" id="reg-button" name="submit">Sign up for SFC</button>
        </pre>
      </form>
    </div>

  <!-- ************************************************** REGISTR ************************************************** -->

</body>
</html>


