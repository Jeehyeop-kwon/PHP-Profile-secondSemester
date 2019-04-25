<?php 

	$ok = $nav = false;
	if (!empty($_SESSION['admin_id'])) {
		if(!$_SESSION['admin_search'] == null){
			$ok = true;
			$nav = "mr-auto";
			$_SESSION['admin_search'] = null;
		}
	}
	
?>
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

<body class="adminLogin">
	<header>
	
	  <nav class="navbar navbar-expand-sm bg-success navbar-dark justify-content-center">
	    <ul class="navbar-nav <?php echo $nav ?>">
		  <li class="nav-item">
			<a href="register.php" class="nav-link">Admin Register</a>
		  </li>
		  <li class="nav-item">
			<a href="../users/login.php" class="nav-link" >User Login</a>
		  </li>
		  <li class="nav-item">
			<a href="admin-logout.php" class="nav-link">Admin Logout</a>
		  </li> 
		</ul>
		<?php if($ok == true){
			require('searchForm.php');
		}
		 ?>
	  </nav>
	</header>
	