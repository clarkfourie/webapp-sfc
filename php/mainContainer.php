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
<!-- <link rel="stylesheet" href="../css/entryInfo.css" type="text/css" /> -->
<!-- hotlink jQuery and jQuery validation plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<!-- <script src="../js/entryInfo.js"></script> -->
</head>
<body class="login">

  <!-- ************************************************** TOP BAR ************************************************** -->

<div id="top-bar" class="knockout-around">
    <div id="top-bar-left" >
      <div class="soft-embossed"><img class="image-wrap" src="..\img\logo\SFC shadow small.png" alt="logo img"></div>
      <span class="bot-left">Welcome <?=$_SESSION['sess_user'];?></span>
    </div>

    <div id="top-bar-right" >
      <label id="userID"><?=$_SESSION['sess_user'];?></label>
    </div>
</div>

  <!-- ************************************************** TOP BAR ************************************************** -->

<div class="empty-space">
</div>

<div id="navBar">

	<ul class="topnav">
	  <li><a class="active" href="#home">Home</a></li>
	  <li><a href="#news">News</a></li>
	  <li><a href="#contact">Contact</a></li>
	  <li class="right"><a href="#about">About</a></li>
	</ul>

</div>

<div class="empty-space">
</div>

<div id="content" class="bottom-to-top">
	<?php include("main.php"); ?>
	
<div class="empty-space">
</div>

</body>
</html>