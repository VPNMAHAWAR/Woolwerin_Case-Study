<?php
  ob_start();
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/signin.css" rel="stylesheet">
	<title>Admin Login</title>
</head>
<body>

<?php
if(isset($_POST['Submit'])){
    $logins = array('admin' => '123456');

    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

  if (isset($logins[$Username]) && $logins[$Username] == $Password){
    $_SESSION['UserData']['Username']=$logins[$Username];
    header("location:admin.php");
    exit;
} else {
  $msg="<span style='color:red'>Invalid Login Details</span>";
}
}
?>

    <div class="container text-center"><br><br>
      <form class="form-signin" method="POST" action="login.php">
        <h1 class="h3 mb-3 font-weight-normal">Admin Sign in</h1>
        <?php if(isset($msg)){?>
      <p><?php echo $msg;?></p>
    <?php } ?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="Username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="Password" class="form-control" placeholder="Password" required>
        <button name="Submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <p class="mt-5 mb-3 text-muted text-center">&copy; <a href="http://vpnmahawar.site" target="_blank">VPNMAHAWAR</a></p>
    </div>
</body>
</html>