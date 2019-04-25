<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Project two </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="include/main.css">
</head>
<body class="login">
<header>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
    <ul class="navbar-nav">
	    <li class="nav-item active">

		<?php 
			if (!empty($_SESSION['user_id'])) { 
		?>
		<li class="nav-item">
		  <a href="userProfile.php" class="nav-link">User Profile</a>
		</li>
		<li class="nav-item">
		  <a href="logout.php" class="nav-link">Log out</a>
		</li>

		<?php 
			} else { 
		?>	
		<li class="nav-item">		
			<a href="register.php" class="nav-link">Register</a>
		</li>
		<li class="nav-item">
			<a href="../client/login-admin.php" class="nav-link">Admin</a>
		</li>
		<li class="nav-item">
			<a href="login.php" class="nav-link" >Login</a>
		</li>
		<?php 
			} 
		?>
	  </ul>
  </nav>
</header>
	