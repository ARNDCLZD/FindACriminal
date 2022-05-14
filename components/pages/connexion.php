<?php include('../../database.php') ?>

<?php
	$action = isset($_GET["action"]) ? $_GET["action"] : false;
	echo $action;
	if($action == 'destroy'){
		session_destroy();
		header("Location: http://localhost/FindACriminal/index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
  <div class="header">
  	<h2>Sign in</h2>
  </div>
	 
  <form method="post" action="connexion.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Sign in</button>
  	</div>
  	<p>
  		Not yet a member? <a href="inscription.php">Sign up</a>
  	</p>
  </form>
</body>
</html>