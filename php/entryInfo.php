<?php
session_start();

// Include site constants and $link to database
include_once "base.php";

// ******************** PERSONAL QUERIES ********************

// Amount of questions received
$sqlSelectPersonalQuestions = "SELECT * FROM userquestion WHERE uid='" . $_SESSION['sess_uid'] . "'";
$personalQuestionsQuery = mysqli_query($link, $sqlSelectPersonalQuestions);
$personalQuestionsValue = mysqli_num_rows($personalQuestionsQuery);

// Date of first questions received 
$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM userquestion WHERE uid='" . $_SESSION['sess_uid'] . "' ORDER BY CREATS LIMIT 1"));
$resultFD = $row['CREATS'];

// Questions answered
$answered_personal = mysqli_query($link, "SELECT * FROM userquestion WHERE uid='" . $_SESSION['sess_uid'] . "' AND answered=1");
$numAnswered = mysqli_num_rows($answered_personal);

// Questions answered correctly
$correct_personal = mysqli_query($link, "SELECT * FROM userquestion WHERE uid='" . $_SESSION['sess_uid'] . "' AND score=1");
$numCorrect = mysqli_num_rows($correct_personal);

// ******************** GLOBAL QUERIES ********************

// Amount of questions received
$sqlSelectGlobalQuestions = "SELECT * FROM userquestion";
$globalQuestionsQuery = mysqli_query($link, $sqlSelectGlobalQuestions);
$globalQuestionsValue = mysqli_num_rows($globalQuestionsQuery);

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Spoilt for Choice</title>
<link rel="stylesheet" href="../css/index.css" type="text/css" />
<link rel="stylesheet" href="../css/entryInfo.css" type="text/css" />
<!-- hotlink jQuery and jQuery validation plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="../js/entryInfo.js"></script>
</head>
<body class="login">

  <!-- ************************************************** TOP BAR ************************************************** -->

<div id="top-bar" class="knockout-around">
    <div id="top-bar-left" >
      <div class="soft-embossed"><img class="image-wrap" src="..\img\logo\SFC shadow small.png" alt="logo img"></div>
      <span class="bot-left">Entry Information.</span>
    </div>

    <div id="top-bar-right" >
      <label id="userID"><?=$_SESSION['sess_user'];?></label>
    </div>
</div>

  <!-- ************************************************** TOP BAR ************************************************** -->

<div class="empty-space">
</div>

  <!-- ************************************************** CONTENT ************************************************** -->

<div id="content" class="knockout-top-to-bottom">

  <ul class="tab">
    <li><a href="#" class="tablinks" id="default_tab" onclick="chooseStats(event, 'personal')">Personal</a></li>
    <li><a href="#" class="tablinks" onclick="chooseStats(event, 'global')">Global</a></li>
  </ul>

  <div id="personal" class="tabcontent">

    <h3>Personal</h3>

    <table>
      <tr>
        <td>Questions received since first entry (<?=$resultFD?>)  </td>
        <td><?php echo $personalQuestionsValue;?></td>
      </tr>
      <tr>
        <td>Questions answered</td>
        <td><?php echo $numAnswered;?></td>
      </tr>
      <tr>
        <td>Questions answered correctly</td>
        <td><?php echo $numCorrect;?></td>
      </tr>
      <tr>
        <td>Island Trading</td>
        <td>Helen Bennett</td>
      </tr>
      <tr>
        <td>Laughing Bacchus Winecellars</td>
        <td>Yoshi Tannamuri</td>
      </tr>
      <tr>
        <td>Magazzini Alimentari Riuniti</td>
        <td>Giovanni Rovelli</td>
      </tr>
    </table>

  </div>

  <div id="global" class="tabcontent">
    <h3>Global</h3>
    <p><?php echo $globalQuestionsValue;?></p> 
  </div>

</div>

  <!-- ************************************************** CONTENT ************************************************** -->

<div class="empty-space">
</div>

</body>
</html>