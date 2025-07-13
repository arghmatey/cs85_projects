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

            // Returns string summarizing project
            // Example output: "Project: Spring Coat using Wool fabric. Time invested: 8 hours."
            public function displaySummary() {
                return "Project: $this->name using $this->fabric. Time invested: $this->hoursSpent hours.";
            }

            // If project has a pattern, add 2 hours for cutting and ironing
            // If project has no pattern, add 4 hours for drafting, cutting and ironing
            // Example output: 5
            public function estimatedTotalTime() {
                return $this->hasPattern ? $this->hoursSpent + 2 : $this->hoursSpent + 4;
            }

            // Changes completed to true
            public function markAsCompleted() {
                $this->completed = true;
            }
        }
    ?>
</body>
</html>
