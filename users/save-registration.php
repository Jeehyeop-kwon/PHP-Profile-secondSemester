<?php
$page_title = 'Saving your Registration...';
require_once('include/header.php');

// store the inputs into variables
$user_email = $_POST['user_email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;


// validation
if (empty($user_email)) {
    echo 'Your email is required<br />';
    $ok = false;
}

if (empty($password)) {
    echo 'Password is required<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords must match<br />';
    $ok = false;
}

if ($ok) {
    // connect
    require_once ('include/azureDatabase.php');

    // set up the sql insert
    $sql = "INSERT INTO project2 (user_email, password) VALUES (:user_email, :password);";

    // hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // fill the params and execute
    $cmd = $conn->prepare($sql);

    $cmd->bindParam(':user_email', $user_email);
    $cmd->bindParam(':password', $hashed_password);
    $cmd->execute();

    // disconnect
    $conn = null;

    echo 'Your registration was successful.  
        Click to <a href="login.php">Log In</a>';
}

require_once('include/footer.php');;
?>
