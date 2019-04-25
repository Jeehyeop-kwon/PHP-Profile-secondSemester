<?php 

// authentication check
require_once('auth.php');

$page_title = null;
$page_title = 'User Profile';
$user_id = $_SESSION['user_id'];

require_once('include/header.php');
require_once('appvars.php');

// connect
require_once('include/azureDatabase.php');

// write the sql query
$sql = "SELECT * FROM project2 where user_id = :user_id;"; 
$cmd = $conn->prepare($sql); 
$cmd->bindparam(':user_id', $user_id);
$cmd->execute(); 
$userInfo = $cmd->fetch();
$cmd->closeCursor(); 

//filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

if($userInfo['picture_description'] == null || $userInfo['photo'] == null){
	$photo = '';
} else {
	$picture_description = $userInfo['picture_description'];
	$photo = UPLOADPATH . $userInfo['photo'];	
}

if($userInfo['username'] == null){
	$username = 'Update your user name';
} else {
	$username = $userInfo['username'];	
}
if($userInfo['location'] == null){
	$location = 'Update your location';
} else {
	$location = $userInfo['location'];	
}
if($userInfo['skills'] == null){
	$skills = 'Update your location';
} else {
	$skills = $userInfo['skills'];	
}
if($userInfo['user_link'] == null){
	$user_link = 'Update your url';
} else {
	$user_link = $userInfo['user_link'];	
}

?>

<main class="container" style="width:400px">
   <h1> Profile </h1>
  	<div class="card" style="width:400px">
      <img class="card-img-top" src="<?php echo $photo ?>" alt="Update your picture" >
      <div class="card-img-overlay">
      </div>
      <div class="card-body">
        <p class="card-text-">Name : <?php echo "$username"?></p>
        <p class="card-text">Location : <?php echo "$location"?></p>
        <p class="card-text">skills : <?php echo "$skills"?></p>
        <p class="card-text">URL : <?php echo "$user_link"?></p>
	    </div>
      <div class="btn-group">
        <a href="updateProfile.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary">Update</a>
        <a href="deleteProfile.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary">Delete</a>
      </div>
   	</div>
</main>


<?php require_once('include/footer.php'); ?>



