<?php 
$title = 'Add Show';
include('shared/header.php'); ?>

<h2>Add a New Show</h2>
<form>
    <fieldset>
        <label for="name">Name: *</label>
        <input name="name" id="name" required />
    </fieldset>
    <fieldset>
        <label for="releaseYear">Release Year: *</label>
        <input name="releaseYear" id="releaseYear" required placeholder="1970" type="number" min="1970" />
    </fieldset>
    <fieldset>
        <label for="genre">Genre: *</label>
        <input name="genre" id="genre" required />
    </fieldset>
    <fieldset>
        <label for="service">Service: *</label>
        <input name="service" id="service" required />
    </fieldset>
    <button>Submit</button>
</form>
</body>
</html>