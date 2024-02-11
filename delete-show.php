<?php
// read the showId from the url parameter using $_GET   
$showId = $_GET['showId'];

if (is_numeric($showId)) {
    // connect to db
    include('shared/db.php');

    // prepare SQL DELETE
    $sql = "DELETE FROM shows WHERE showId = :showId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':showId', $showId, PDO::PARAM_INT);

    // execute the delete
    $cmd->execute();

    // disconnect
    $db = null;

    // show a message (temporarily)
    echo 'Show Deleted';

    // redirect back to updated shows.php (eventually)
    header('location:shows.php');
}
?>