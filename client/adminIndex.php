<?php 

// authentication check
require_once('auth.php');

$page_title = null;
$page_title = 'Admin Management webpage';
$admin_id = $_SESSION['admin_id'];
$_SESSION['admin_search'] = 1;

require_once('include/header.php');
require_once('../users/appvars.php');


// connect
require_once('../users/include/azureDatabase.php');

// write the sql query
  $sql = "SELECT * FROM project2;"; 
  $cmd = $conn->prepare($sql); 
  $cmd->execute(); 
  $userInfos = $cmd->fetchAll();

  ?>

  <main class="container">
    <h2> Profile </h2>
    <div class="card-deck" >

    <?php foreach ( $userInfos as $userInfo ) : ?>
     
      <div class="card card bg" style="min-width: 250px; max-width: 250px">
        <img class="card-img-top" src="../users/images/<?php echo $userInfo['photo']; ?>" alt="Update your picture" >
        <div class="card-img-overlay">
        </div>
        <div class="card-body text-center">
          <p class="card-text-">Name : <?php echo $userInfo['username'];?></p>
          <p class="card-text">Location : <?php echo $userInfo['location'];?></p>
          <p class="card-text">skills : <?php echo $userInfo['skills'];?></p>
          <p class="card-text">URL : <?php echo $userInfo['user_link'];?></p>
        </div>
        <div class="btn-group">
          <a href="updateProfile.php?&user_id=<?php echo $userInfo['user_id']; ?>" class="btn btn-primary">Update</a>
          <a href="deleteProfile.php?user_id=<?php echo $userInfo['user_id']; ?>" class="btn btn-primary">Delete</a>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </main>


<?php
  
  $cmd->closeCursor(); 
  require('include/footer.php'); 

?>



