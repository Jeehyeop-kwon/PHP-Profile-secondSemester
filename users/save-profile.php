<?php ob_start();

// auth check
require_once('auth.php');

// header
$page_title = null;
$page_title = 'Saving your profile...';
require_once('include/header.php');

// save form inputs into variables
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

$picture_description = filter_input(INPUT_POST, 'picture_description');
$photo = $_FILES['photo']['name'];
$username = filter_input(INPUT_POST, 'username');
$location = filter_input(INPUT_POST, 'location');
$skills = filter_input(INPUT_POST, 'skills');
$user_link = filter_input(INPUT_POST, 'user_link');


// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($picture_description)) {
	// notify the user
	echo 'Picture description is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($photo)) {
	// notify the user
	echo 'Photo is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($username)) {
	echo 'User Name is invalid<br />';
	$ok = false;
}

if (empty($location)) {
	// notify the user
	echo 'Location is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}
if (empty($skills)) {
	echo 'Skills are invalid<br />';
	$ok = false;
}

if (empty($user_link)) {
	// notify the user
	echo 'URL is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if ($ok == true) {

	require('appvars.php'); 
	require_once('include/azureDatabase.php');

	// set up the SQL UPDATE command to modify the existing movie
	$sql = "UPDATE project2 SET username = :username, location = :location, skills = :skills, user_link = :user_link WHERE user_id = :user_id";
	
	// create a command object and fill the parameters with the form values
	$cmd = $conn->prepare($sql);
	$cmd->bindParam(':username', $username);
	$cmd->bindParam(':location', $location);
	$cmd->bindParam(':skills', $skills);
	$cmd->bindParam(':user_link', $user_link);
	$cmd->bindParam(':user_id', $user_id);
	$cmd->execute();

	$conn = null;

	require('include/azureDatabase.php');

	$picture_description = $_POST['picture_description']; 

    //use $_FILES to grab the picture info 
    $photo = $_FILES['photo']['name']; 

    $photo_type = $_FILES['photo']['type']; 

    $photo_size = $_FILES['photo']['size']; 


	if((($photo_type != 'image/gif') || ($photo_type != 'image/jpg') || ($photo_type != 'image/jpeg') || ($photo_type != 'image/png')) && (!$photo_size > 0) && (!$photo_size <= MAXFILESIZE)) {

	echo '<p> The must submit either a png, jpeg, jpg, or a png and your file cannot be bigger than 32kb <p>'; 
	//check for file upload errors 
	}

	if ($_FILES['photo']['error'] == 0){	
		$target = UPLOADPATH . $photo; 
	  echo 'file error : '. $_FILES['photo']['error'].'<br>';
	} 

	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target )){

		//echo 'file tmp_name : '.$_FILES['photo']['tmp_name'].'<br>';
	
	  // set up our query 
	  $sql = "UPDATE project2 SET picture_description = :picture_description,  photo = :photo WHERE user_id = :user_id;"; 
	  
	  //prepare 
	  $cmd = $conn->prepare($sql); 
	  
	  //bind
	  $cmd->bindParam(':picture_description', $picture_description);
	  $cmd->bindParam(':photo', $photo);
	  $cmd->bindParam(':user_id', $user_id);

	  //execute 
	  $cmd->execute(); 
	  
	  //close the db connection 
	  $cmd->closeCursor(); 

	  echo "your profile saved succeefully";

	  header('Location: userProfile.php');
	}
}
	
// show confirmation
require_once('include/footer.php');
ob_flush();

?>

