<?php 
$title = 'Add Show';
include('shared/header.php'); ?>

<h2>Add a New Show</h2>
<form method="post" action="insert-show.php">
    <fieldset>
        <label for="name">Name: *</label>
        <input name="name" id="name" />
    </fieldset>
    <fieldset>
        <label for="releaseYear">Release Year: *</label>
        <input name="releaseYear" id="releaseYear"  placeholder="1970"  />
    </fieldset>
    <fieldset>
        <label for="genre">Genre: *</label>
        <input name="genre" id="genre"  />
    </fieldset>
    <fieldset>
        <label for="service">Service: *</label>
        <input name="service" id="service"  />
    </fieldset>
    <button>Submit</button>
</form>
</body>
</html>