


<?php
ob_start();

$user_email = $_POST['user_email'];
$password = $_POST['password'];

require_once ('include/azureDatabase.php');

$sql = "SELECT * FROM project2 WHERE user_email = :user_email;";

echo $sql;
$cmd = $conn->prepare($sql);
$cmd->bindParam(':user_email', $user_email);
$cmd->execute();
$user = $cmd->fetch();


if($user != null && password_verify($password, $user['password'])){
	
	echo 'Logged in Successfully';
	session_start(); // access the existing session
	$_SESSION['user_id'] = $user['user_id'];
   
    header('location: userProfile.php');
 
} else {
	header('location: login.php');
 
}

$conn = null;	
ob_flush();
?>


