<?php
$title = 'Saving New Service';
include('shared/header.php');

// capture form input
$name = $_POST['name'];
$ok = true;

// validation
if (empty($name)) {
    $ok = false;
    echo 'Name is required';
}

if ($ok == true) {
    // connect to db
    include('shared/db.php');

    // set up SQL INSERT
    $sql = "INSERT INTO services (name) VALUES (:name)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
    $cmd->execute();

    $db = null;
    echo 'Service Saved';
}

?>
</main>
</body>
</html>