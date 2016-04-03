<?php
session_start();

// Include site constants and $link to database
include_once "base.php";

$rand = 1; /*mt_rand(1,10);*/

$dbQuestion = "";
$dbAns1 = $dbAns2 = $dbAns3 = $dbAns4 = "";
$dbSponsor1 = $dbSponsor2 = $dbSponsor3 = $dbSponsor4 = "";
$dbImg1 = $dbImg2 = $dbImg3 = $dbImg4 = "";

// fetch info from database
$sql = "SELECT * FROM questions WHERE questid='" . $rand . "'";
$query = mysqli_query($link, $sql);
if(mysqli_num_rows($query) != 0) {
	
	while ($row = mysqli_fetch_assoc($query)) {

		$dbQuestion = $row['question'];

		$dbAns1 = $row['ans1'];
		$dbAns2 = $row['ans2'];
		$dbAns3 = $row['ans3'];
		$dbAns4 = $row['ans4'];

		$dbSponsor1 = $row['sponsor1'];
		$dbSponsor2 = $row['sponsor2'];
		$dbSponsor3 = $row['sponsor3'];
		$dbSponsor4 = $row['sponsor4'];

		$dbImg1 = $row['img1'];
		$dbImg2 = $row['img2'];
		$dbImg3 = $row['img3'];
		$dbImg4 = $row['img4'];
	}
} else {
	echo "This question does not exist!";
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/main.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>

	<h2>Welcome, <?=$_SESSION['sess_user'];?>! <a href="logout.php">Logout</a></h2>

	<p>random: <?php echo $rand; ?></p>

	<div id="imgContainer">

		<table name="imgTable" align="center">
			<tr>
				<p align="center"><?php echo $dbQuestion; ?></p>
			</tr>
			<tr>
			  	<td>
		    	<div class="block1">
				    <img src="<?php echo $dbImg1?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor1; ?></h4>
					         <p><?php echo $dbAns1; ?></p>
					    </div>
					</div>

			    </td>
			    <td>
			    	
			    	<div class="block2">
					    <img src="<?php echo $dbImg2?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor2; ?></h4>
					         <p><?php echo $dbAns2; ?></p>
					    </div>
					</div>

			    </td> 
			</tr>
			<tr>
			    <td>

			    	<div class="block3">
					    <img src="<?php echo $dbImg3?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor3; ?></h4>
					         <p><?php echo $dbAns3; ?></p>
					    </div>
					</div>		    	

				</td>
				<td>

			    	<div class="block4">
					    <img src="<?php echo $dbImg4?>" alt="check db path" width="300" height="300">
					    <div class="snipit">
					         <h4><?php echo $dbSponsor4; ?></h4>
					         <p><?php echo $dbAns4; ?></p>
					    </div>
					</div>

				</td> 
			</tr>
		</table>		

	</div>

</body>
</html>
