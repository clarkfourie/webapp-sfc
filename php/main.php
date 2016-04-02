<?php
session_start();

$rand = mt_rand(1,10);

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
				<p align="center">Static question?</p>
			</tr>
			<tr>
			  	<td>
		    	<div class="block1">
				    <!-- <img src="..\img\client\absa.png" alt="img11" width="300" height="300"> -->
					    <div class="snipit">
					         <h4>ABSA</h4>
					         <p>This is absa.</p>
					    </div>
					</div>

			    </td>
			    <td>
			    	
			    	<div class="block2">
					    <!-- <img src="..\img\client\fnb.png" alt="img12" width="300" height="300"> -->
					    <div class="snipit">
					         <h4>FNB</h4>
					         <p>This is fnb.</p>
					    </div>
					</div>

			    </td> 
			</tr>
			<tr>
			    <td>

			    	<div class="block3">
					    <!-- <img src="..\img\client\standard bank.png" alt="img21" width="300" height="300"> -->
					    <div class="snipit">
					         <h4>STANDARD BANK</h4>
					         <p>This is sb.</p>
					    </div>
					</div>		    	

				</td>
				<td>

			    	<div class="block4">
					    <!-- <img src="..\img\client\nedbank.png" alt="img22" width="300" height="300"> -->
					    <div class="snipit">
					         <h4>NEDBANK</h4>
					         <p>This is nb.</p>
					    </div>
					</div>

				</td> 
			</tr>
		</table>		

	</div>

</body>
</html>
