<?php 
include('shared/auth.php');
$title = 'Add Show';
include('shared/header.php'); ?>

<h2>Add a New Show</h2>
<form method="post" action="insert-show.php">
    <fieldset>
        <label for="name">Name: *</label>
        <input name="name" id="name" required />
    </fieldset>
    <fieldset>
        <label for="releaseYear">Release Year: *</label>
        <input name="releaseYear" id="releaseYear" required placeholder="1970" type="number" min="1970"  />
    </fieldset>
    <fieldset>
        <label for="genre">Genre: *</label>
        <input name="genre" id="genre" required />
    </fieldset>
    <fieldset>
        <label for="service">Service: *</label>
        <select name="service" id="service" required>
            <?php
            // connect
            include('shared/db.php');

            // set up & run query, store data results
            $sql = "SELECT * FROM services ORDER BY name";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $services = $cmd->fetchAll();

            // loop through list of services, adding each one to dropdown 1 at a time
            foreach ($services as $service) {
                echo '<option>' . $service['name'] . '</option>';
            }

            // disconnect
            $db = null;
            ?>
        </select>
    </fieldset>
    <button class="offset-button">Submit</button>
</form>
</main>
</body>
</html>