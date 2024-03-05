<?php
// 1. capture form inputs
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

// 2. validate inputs
if (empty($username)) {
    echo 'Username is required<br />';
    $ok = false;
}

if (strlen($password) < 8) {
    echo '8-Char Password is required<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords must match<br />';
    $ok = false;
}

// 3. hash the password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// 4. connect to db & insert new user
include('shared/db.php');
$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->bindParam(':password', $passwordHash, PDO::PARAM_STR, 255);
$cmd->execute();

// 5. disconnect
$db = null;

// 6. confirmation
echo 'User Saved';

// 7. redirect to login

?>