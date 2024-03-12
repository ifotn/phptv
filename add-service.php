<?php 
// auth check
include('shared/auth.php');

$title = 'Add Service';
include('shared/header.php'); ?>

<h2>Add a New Service</h2>
<form method="post" action="insert-service.php">
    <fieldset>
        <label for="name">Name: *</label>
        <input name="name" id="name" required />
    <button>Submit</button>
</form>
</main>
</body>
</html>