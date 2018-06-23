<?php
	ob_start();
	session_start();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/signin.css" rel="stylesheet">
	<title>All Teams</title>
</head>
<body>
	<div class="container">
<?php 
	//Connection to databasd
	DEFINE('DB_USER', 'id6280397_tetst');
	DEFINE('DB_PASS', '123456');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_NAME', 'id6280397_w');

	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) OR die('Could not connect to mysql' . mysqli_connect_error());

	if(!isset($_SESSION['UserData']['Username'])){
		?>
		<a href="login.php" class="btn btn-primary float-right m-0">Admin</a>
		<?php
	}
	else {
		?>
		<a href="logout.php" class="btn btn-primary float-right" style="top:0px;">Logout</a>
		<a href="admin.php" class="btn btn-primary float-right mr-2" style="top:0px;">Update Teams</a>
		<?php	
	}
?><br><br>
		<div class="row">
			<div class="col border">
				<h3 class="text-center">Team 1</h3>
				<?php
					$query = "SELECT * FROM teams;";
					$response = mysqli_query($dbc, $query);
					if ($response){
						$row = mysqli_fetch_array($response);
						echo "<p>" . $row['team1']. "</p>";
					}
					else {
						echo 'Failed to connect ' . mysqli_error($dbc);
					}
				?>
			</div>
			<div class="col border">
				<h3 class="text-center">Team 2</h3>
				<?php
						echo "<p>" . $row['team2']. "</p>";
				?>
			</div>
		</div>

		<p class="mt-5 mb-3 text-muted text-center">&copy; <a href="http://vpnmahawar.site" target="_blank">VPNMAHAWAR</a></p>
	</div>
</body>
</html>