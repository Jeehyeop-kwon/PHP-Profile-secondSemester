<?php ob_start();

// authentication check
require_once('auth.php');
require_once('../users/appvars.php');

// set page title
$page_title = null;
$page_title = 'Update Profile';

// embed the header
require_once('include/header.php');

// initialize variables
$user_id = $_GET['user_id'];
$picture_description = "";
$photo = "";
$username = "";
$location = "";
$skills = "";
$user_link = "";



// check the url for a movie_id parameter and store the value in a variable if we find one
if (empty($_GET['user_id']) == false) {
	$user_id = $_GET['user_id'];

	// connect
	require_once('../users/include/azureDatabase.php');
	
	// write the sql query
	$sql = "SELECT * FROM project2 WHERE user_id = :user_id";
	
	// execute the query and store the results
	$cmd = $conn->prepare($sql);
	$cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$cmd->execute();
	$users = $cmd->fetchAll();
	
	// populate the fields for the selected movie from the query result
	foreach ($users as $user) {
		$picture_description = $user['picture_description'];
		$photo = $user['photo'];
		$username = $user['username'];
		$location = $user['location'];
		$skills = $user['skills'];
		$user_link = $user['user_link'];
	}
	
	// disconnect
	$conn = null;
} else {
	header('Location: login-admin.php');
	exit();
}

?>

	<div class="container" style="width:600px">

	  <form enctype="multipart/form-data" method="post" action="save-profile.php">

	     <fieldset class="form-group">
       	   <label for="photo">Photo:</label>
           <input name="photo" class="form-control" type="file" id="photo" required value="<?php echo $photo; ?>" >
           <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAXFILESIZE; ?>"><br>
         </fieldset>

         <fieldset class="form-group">
           <label for="picture_description">Description: </label>
           <input name="picture_description" class="form-control" type="text" id="picture_description" required value="<?php echo $picture_description; ?>">
	    </fieldset>  
      
        <fieldset class="form-group">
           <label for="username"">User Name:</label>
           <input name="username" class="form-control" id="username" required type="text" value="<?php echo $username; ?>" />
        </fieldset>

        <fieldset class="form-group">
           <label for="location">Location:</label>
           <input name="location" class="form-control" id="location" required type="text" value="<?php echo $location; ?>" />
        </fieldset>
        <fieldset class="form-group">
          <label for="skills" >Skills:</label>
          <input name="skills" class="form-control" id="skills" required type="text" value="<?php echo $skills; ?>" />
        </fieldset>
         <fieldset class="form-group">
          <label for="user_link" >URL:</label>
          <input name="user_link" class="form-control" id="user_link" required type="url" value="<?php echo $user_link; ?>" />
        </fieldset>
        <input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
        <button type="submit" >Submit</button>
	  </form>
	</div>

<?php // embed footer
require_once('include/footer.php'); 
ob_flush(); ?>