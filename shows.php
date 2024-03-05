<?php
$title = 'Show Library';
include('shared/header.php');

// connect
include('shared/db.php');

// set up query to fetch show data
$sql = "SELECT * FROM shows";
$cmd = $db->prepare($sql);

// run query & store results in var called $shows
$cmd->execute();
$shows = $cmd->fetchAll();

// start the list
echo '<h1>Show Library</h1>';
echo '<table><thead><th>Name</th><th>Release Year</th><th>Genre</th><th>Service</th><th>Actions</th></thead>';

// loop through the dataresult from the query, and display each show name
foreach ($shows as $show) {
    echo '<tr>
        <td>' . $show['name'] . '</td>
        <td>' . $show['releaseYear'] . '</td>
        <td>' . $show['genre'] . '</td>
        <td>' . $show['service'] . '</td>
        <td class="actions">
            <a href="edit-show.php?showId=' . $show['showId'] . '">
                Edit
            </a>&nbsp;
            <a href="delete-show.php?showId=' .$show['showId'] . '" onclick="return confirmDelete();">
                Delete
            </a>
        </td>
        </tr>';
}

// end list
echo '</table>';

//disconnect
$db = null;
?>
</main>
</body>
</html>