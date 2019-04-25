<?php
	require_once('header.php');
	require_once('../auth.php');	
  	require('../../users/include/azureDatabase.php');

    $username = $location = $skills = $user_link = $user_search = $results = "";

    //if(isset($_POST['search'])){
    if(!empty($_POST['search'])){

	    //grab the search term from the user 
	    $user_search = $_POST['search']; 
	    //covert search terms to a list with explode()
	    $search_words = explode(' ', $user_search); 
	    //build the first part of our query 
	    $query = "SELECT * FROM project2 WHERE "; 
	    //initialize the where variable 
	    $where = ""; 
	    //loop through and build the query 
	    foreach($search_words as $word) {
	      $where = $where. "username LIKE '%$word%' OR ";
	    }
	    $where = substr($where, 0, strlen($where)-4); 
	    $final_sql = $query . $where; 
	  
	    //echo $final_sql; 
	    $cmd = $conn->prepare($final_sql); 
	    $cmd->execute(); 
	    $results = $cmd->fetchAll();

	} else {
		header('location: ../adminIndex.php');
		exit();
	}

?>

<table class="table table-bordered table-sm">
    <thead class="thead-dark">
      <th> username </th>
      <th> location </th>
      <th> skills </th>
      <th> user_link </th>
    </thead>
    <?php foreach ( $results as $result ) :?>
    <tbody >
      	<tr>
      	  <td><?php echo $result['username']; ?></td>
		  <td><?php echo $result['location']; ?></td>
		  <td><?php echo $result['skills']; ?></td>
		  <td><?php echo $result['user_link']; ?></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>
<div>
  <a href="../adminIndex.php?&admin_id=<?php echo $_SESSION['admin_id']; ?>" class="btn btn-primary bg-success">Home</a>
</div>


<?php
  
  $cmd->closeCursor(); 
  require('footer.php'); 

?>

       