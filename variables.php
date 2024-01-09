<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<body>
    <h1>Experimenting with PHP Variables</h1>
    <?php
    // number vars
    $x = 20;
    $y = 10;
    $z = $x + $y;
    echo $z . '<br />';

    // string vars
    $firstName = 'Some';
    $lastName = 'Person';
    echo '<p>Welcome '. $firstName . ' ' . $lastName . '</p>';
    echo "<p>Welcome $firstName $lastName</p>";

    ?>
</body>
</html>