<?php ob_start();
	session_start();
	if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
	}
	//Connection to databasd
	DEFINE('DB_USER', 'id6280397_tetst');
	DEFINE('DB_PASS', '123456');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_NAME', 'id6280397_w');

	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) OR die('Could not connect to mysql' . mysqli_connect_error());

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/signin.css" rel="stylesheet">
	<title>Update Teams</title>
</head>
<body>
	<div class="container">
<?php ob_start();
	if(isset($_SESSION['UserData']['Username'])){
		?>
		<a href="logout.php" class="btn btn-primary float-right">Logout</a>
		<a href="index.php" class="btn btn-primary float-right mr-2">Index</a>
		<?php
	}
?>

		<br><br>
		<h2 class="text-center">Current Teams</h2>
		<div class="row">
			<div class="col border m-2 p-2">
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
			<div class="col border m-2 p-2">
				<h3 class="text-center">Team 2</h3>
				<?php
						echo "<p>" . $row['team2']. "</p>";
				?>
			</div>
		</div>
		<br><br>
		<h2 class="text-center">Update Teams</h2>
		<div class="row">
			<?php
				if(isset($_POST['up1'])){
					$n1 = $_POST['team1'];
					$q1 = "UPDATE teams SET team1='$n1';";
					$r1 = mysqli_query($dbc, $q1);
					if($r1){
						$msg1 = "<h4 class='text-center'>Team 1 Updated Successfully!!</h4>";
					}
					else{
						echo mysqli_error($dbc);
					}
				}
			?>
			<div class="col border m-2 p-2">
				<h3 class="text-center">Team 1</h3>
				<?php
					if(isset($msg1)){
						echo $msg1;
					}
				?>
				<form class="form-signin" method="POST" action="admin.php">
			        <textarea name="team1" cols="50" rows="5" class="form-control" placeholder="Use html tags (<br>,<b> </b> etc.) to format the text" maxlength="500" required></textarea>
			        <button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="up1">Update</button>
			    </form>
			</div>
			<?php
				if(isset($_POST['up2'])){
					$n2 = $_POST['team2'];
					$q2 = "UPDATE teams SET team2='$n2';";
					$r2 = mysqli_query($dbc, $q2);
					if($r2){
						$msg2 = "<h4 class='text-center'>Team 2 Updated Successfully!!</h4>";
					}
					else{
						echo mysqli_error($dbc);
					}
				}
			?>
			<div class="col border m-2 p-2">
				<h3 class="text-center">Team 2</h3>
				<?php
					if(isset($msg2)){
						echo $msg2;
					}
				?>
				<form class="form-signin" method="POST" action="admin.php">	
			        <textarea name="team2" cols="50" rows="5" class="form-control" placeholder="Use html tags (<br>,<b> </b> etc.) to format the text" maxlength="500" required></textarea>
			        <button class="btn btn-lg btn-primary btn-block mt-2" type="submit" name="up2">Update</button>
			    </form>
			</div>
		</div>
		<p class="mt-5 mb-3 text-muted text-center">&copy; <a href="http://vpnmahawar.site" target="_blank">VPNMAHAWAR</a></p>
	</div>
</body>
</html>