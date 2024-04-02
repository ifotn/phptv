<?php
// connect
include('../shared/db.php');

// check for show name filter in url
$name = null;
if (!empty($_GET['name'])) {
    $name = $_GET['name'];
}

// fetch show data
$sql = "SELECT * FROM shows ORDER BY name";

if (!empty($name)) {
    $sql = "SELECT * FROM shows WHERE name = :name";
}

$cmd = $db->prepare($sql);

if (!empty($name)) {
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
}

$cmd->execute();
$shows = $cmd->fetchAll(PDO::FETCH_ASSOC);

if (empty($shows)) {
    echo '{ code: 404, response: "Not Found" }';
}
else {
    // output the json
    echo json_encode($shows);
}

// disconnect
$db = null;
?>