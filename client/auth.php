<?php

// authentication check
session_start();
if (empty($_SESSION['admin_id'])) {
	header('location:login-admin.php');
	exit();
}


?>