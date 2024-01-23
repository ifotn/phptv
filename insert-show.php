<?php
$title = 'Saving New Show...';
include('shared/header.php');

// capture form inputs into vars
$name = $_POST['name'];
echo $name;
$releaseYear = $_POST['releaseYear'];
$genre = $_POST['genre'];
$service = $_POST['service'];

// connect to db using the PDO (PHP Data Objects Library)
//$db = new PDO('mysql:host=127.0.0.1;dbname=comp1006', 'root', 'x');
$db = new PDO('mysql:host=127.0.0.1;dbname=comp1006', 'phpdev', 'x');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$db = new PDO('mysql:host=172.31.22.43;dbname=Rich123456789', 'Rich123456789', 'x');

// set up SQL INSERT command
// NEVER inject variables directly into SQL; vulnerable to SQL Injection Attacks
//$sql = "INSERT INTO shows (name, releaseYear, genre, service) VALUES ($name, $releaseYear, $genre, $service)";

$sql = "INSERT INTO shows (name, releaseYear, genre, service) VALUES (:name, :releaseYear, :genre, :service)";

// link db connection w/SQL command we want to run
$cmd = $db->prepare($sql);

// map each input to a column in the shows table
$cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);
$cmd->bindParam(':releaseYear', $releaseYear, PDO::PARAM_INT);
$cmd->bindParam(':genre', $genre, PDO::PARAM_STR, 20);
$cmd->bindParam(':service', $service, PDO::PARAM_STR, 100);

// execute the INSERT (which saves to the db)
$cmd->execute();

// disconnect
$db = null;

// show msg to user
echo 'Show Saved';
?>

</body>
</html>