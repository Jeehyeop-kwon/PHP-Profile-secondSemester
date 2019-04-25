


<?php
ob_start();
$admin_email = $_POST['admin_email'];
$password = $_POST['password'];

require_once ('../users/include/azureDatabase.php');

$sql = "SELECT * FROM project2_admin WHERE admin_email = :admin_email;";

echo $sql;
$cmd = $conn->prepare($sql);
$cmd->bindParam(':admin_email', $admin_email);
$cmd->execute();
$admin = $cmd->fetch();


if($admin != null && password_verify($password, $admin['password'])){
	
	echo 'Logged in Successfully';
	session_start(); // access the existing session
	$_SESSION['admin_id'] = $admin['admin_id'];
   
    header('location: adminIndex.php');
 
} else {
	header('location: login-admin.php');
 
}

$conn = null;	
ob_flush();
?>


