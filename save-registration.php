<?php
// 1. capture form inputs
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

//try {
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

    // recaptcha validation w/Google API
    $apiUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $secretKey = '6LeYNawpAAAAAE8LnjV8QEzjY8zUsVsjrl9VNJ2p';
    $response = $_POST['g-recaptcha-response'];

    // make the api call and parse json response
    $apiResponse = file_get_contents($apiUrl . "?secret=$secretKey&response=$response");
    $decodedResponse = json_decode($apiResponse);

    if ($decodedResponse->success == false) {
        echo 'Are you human?';
        $ok = false;
    }
    else {
        if ($decodedResponse->score < 0.5) {
            echo 'Are you human?';
            $ok = false;
        }
    }

    // 3. hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // 4. connect to db, check for username duplicate & insert new user
    include('shared/db.php');

    // 4a. duplicate user check
    $sql = "SELECT * FROM users WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    $users = $cmd->fetchAll();

    if (!empty($users)) {
        // username already exists
        $db = null;
        header('location:register.php?duplicate=true');
        exit();
    }

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
/*}
catch (Exception $err) {
    header('location:error.php');
    exit();
}*/
?>