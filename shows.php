<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// connect
$db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'x');

// set up query to fetch show data
$sql = "SELECT * FROM shows";
$cmd = $db->prepare($sql);

// run query & store results in var called $shows
$cmd->execute();
$shows = $cmd->fetchAll();

// start the list
echo '<ul>';

// loop through the dataresult from the query, and display each show name
foreach ($shows as $show) {
    echo '<li>' . $show['name'] . '</li>';
}

// end list
echo '</ul>';

//disconnect
$db = null;
?>

</body>
</html>