<?php ob_start();

// access the existing session
session_start();

// remove all session variables
session_unset();

// destroy the user session
session_destroy();

// redirect to login
header('location:login-admin.php');

ob_flush(); ?>