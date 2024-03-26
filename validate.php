<?php
// 1. capture form inputs
$username = $_POST['username'];
$password = $_POST['password'];

try {
    // 2. connect
    include('shared/db.php');
    $sql = "SELECT * FROM users WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    $user = $cmd->fetch();

    // 3. look for this username
    if (empty($user)) {
        $db = null;
        header('location:login.php?invalid=true');
    }

    // 4. if we find a user w/this username, check hashed password
    if (!password_verify($password, $user['password'])) {
        $db = null;
        header('location:login.php?invalid=true');
    }
    else {
        // login is valid,  both username + hashed password match user in db
        // store identity in session object on web server
        session_start(); // accesses the current session on the server
        $_SESSION['username'] = $username;

        $db = null;
        header('location:shows.php');
    }
}
catch (Exception $err) {
    header('location:error.php');
    exit();
}
?>