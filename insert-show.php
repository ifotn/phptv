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

//$db = new PDO('mysql:host=172.31.22.43;dbname=Rich123456789', 'Rich123456789', 'x');

// set up SQL INSERT command
$sql = "INSERT INTO shows (name, releaseYear, genre, service) VALUES (:name, :releaseYear, :genre, :service)";

// map each input to a column in the shows table

// execute the INSERT (which saves to the db)

// disconnect

// show msg to user

?>

</body>
</html>