<?php 

$page_title = null;
$page_title = 'Login-Admin';

require('include/header.php');

?>

  <main>
  	<div class="container mt-lg-5" style="width:600px; min-height: 500px;">
  		<h1> <?php echo $page_title ?>	</h1>
		<form method="post" action="validate.php">
		  <div class="form-group">
		    <label for="admin_email">Email:</label>
			<input name="admin_email" class="form-control" required type="email" >
		  </div>
		  <div class="form-group">
			<label for="password">Password:</label>
			<input name="password" class="form-control" required type="password">
		  </div>
		  <div>
			<button type="submit" class="btn btn-primary">Log In</button>
		  </div>
	    </form>
	</div>
  </main>

<?php require('include/footer.php'); ?>