<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/main.css" type="text/css" />
</head>
<body class="login">
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
	    	<div id="logo"> <img src="..\img\logo\sfc small.png" alt="logo img"> </div>
	    	<span id="welcome">
	    		<h2><font color="white">Welcome, <?=$_SESSION['sess_user'];?>! <a href="logout.php">Logout</a></font></h2>
			</span>
    <div id="header-main-right">
      <div id="header-main-right-nav">

      </div>
    </div>
  </div>
</div>
<!-- header ends here -->


<div id="content">
	<?php include("main.php"); ?>
	
</div>

</body>
</html>
