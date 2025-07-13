<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewing Project</title>
</head>
<body>
    <?php
        class SewingProject {
            public $name;
            public $fabric;
            public $hoursSpent;
            public $hasPattern;
            public $completed;

            // Initialize all five properties with given values
            public function __construct($name, $fabric, $hoursSpent, $hasPattern, $completed) {
                $this->name = $name;
                $this->fabric = $fabric;
                $this->hoursSpent = $hoursSpent;
                $this->hasPattern = $hasPattern;
                $this->completed = $completed;
            }
        }
    ?>
</body>
</html>