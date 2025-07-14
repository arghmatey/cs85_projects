<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewing Project Tracker</title>
</head>
<body>
    <h1>Sewing Projects</h1>

    <?php 
        echo "<h1>Sewing Project Tracker</h1>";
        echo "<p>" . $project->getSummary() . "</p>";
    ?>
</body>
</html>