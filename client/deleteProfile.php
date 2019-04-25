<?php 

	ob_start();


	require('../users/include/azureDatabase.php');

	$picture_description = $photo = $username = $location = $skills = $user_link = NULL;
	

	$sql = "UPDATE project2 SET picture_description = :picture_description, photo = :photo, username = :username, location = :location, skills = :skills, user_link = :user_link WHERE user_id = :user_id";

	$cmd = $conn->prepare($sql); 

	$cmd->bindParam(':user_id', $_GET['user_id']);
	$cmd->bindParam(':picture_description', $picture_description);
	$cmd->bindParam(':photo', $photo);
	$cmd->bindParam(':username', $username);
	$cmd->bindParam(':location', $location);
	$cmd->bindParam(':skills', $skills);
	$cmd->bindParam(':user_link', $user_link);

	$cmd->execute(); 

	$cmd->closeCursor();


	ob_flush();

	require('adminIndex.php');
?>