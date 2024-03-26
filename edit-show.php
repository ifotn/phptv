<?php 
include('shared/auth.php');
$title = 'Edit Show';
include('shared/header.php'); 

// get the showId from the url param using $_GET
$showId = $_GET['showId'];

// init vars
$name = null;
$releaseYear = null;
$genre = null;
$service = null;

// if showId is numeric, fetch show from db
if (is_numeric($showId)) {

    try {
        // connect
        include('shared/db.php');

        // run query & populate show properties for display
        $sql = "SELECT * FROM shows WHERE showId = :showId";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':showId', $showId, PDO::PARAM_INT);
        $cmd->execute();
        $show = $cmd->fetch();  // use fetch() for 1 record instead of fetchAll() which is for a list

        $name = $show['name'];
        $releaseYear = $show['releaseYear'];
        $genre = $show['genre'];
        $serviceName = $show['service'];
        $photo = $show['photo'];  // fill var w/show photo name if there is one
    }
    catch (Exception $err) {
        header('location:error.php');
        exit();
    }
}

?>

<h2>Edit Show Details</h2>
<form method="post" action="update-show.php" enctype="multipart/form-data">
    <fieldset>
        <label for="name">Name: *</label>
        <input name="name" id="name" required value="<?php echo $name; ?>" />
    </fieldset>
    <fieldset>
        <label for="releaseYear">Release Year: *</label>
        <input name="releaseYear" id="releaseYear" required placeholder="1970" 
            type="number" min="1970" value="<?php echo $releaseYear; ?>" />
    </fieldset>
    <fieldset>
        <label for="genre">Genre: *</label>
        <input name="genre" id="genre" required value="<?php echo $genre; ?>" />
    </fieldset>
    <fieldset>
        <label for="service">Service: *</label>
        <select name="service" id="service" required>
            <?php
            // set up & run query, store data results
            $sql = "SELECT * FROM services ORDER BY name";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $services = $cmd->fetchAll();

            // loop through list of services, adding each one to dropdown 1 at a time
            // check each service & select the one that matches the show we're editing
            foreach ($services as $service) {
                if ($service['name'] == $serviceName) {
                    echo '<option selected>' . $service['name'] . '</option>';
                }
                else {
                     echo '<option>' . $service['name'] . '</option>';
                }    
            }

            // disconnect
            $db = null;
            ?>
        </select>
    </fieldset>
    <input type="hidden" name="showId" id="showId" value="<?php echo $showId; ?>" />
    <fieldset>
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" />
        <input type="hidden" id="currentPhoto" name="currentPhoto" value="<?php echo $photo; ?>" />
        <?php
        if ($photo != null) {
            echo '<img src="img/uploads/' . $photo . '" alt="Show Photo" />';
        }
        ?>
    </fieldset>
    <button class="offset-button">Submit</button>
</form>
</main>
</body>
</html>