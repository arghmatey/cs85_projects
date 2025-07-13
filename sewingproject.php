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

            // If project has a pattern, return string confirming
            // If project has no pattern, return string suggesting using one
            public function needsPattern() {
                return $this->hasPattern ?  "Pattern being used." : "Consider referencing a pattern for faster results.";
            }

            // AI-GENERATED METHOD
            // Prompt: Write a PHP method for a class named SewingProject that returns a message based on how many hours the project
            // took. The class has a property named $hoursSpent. The method should accept the time spent on a project and return 
            // one of three strings depending on the value of $hoursSpent.
            // Critique: The method using the correct property and is functional. I was able to add it without changing anything. It
            // would need changed manually if the thresholds were to ever change.
            public function getEffortLevel() {
                if ($this->hoursSpent < 2) {
                    return "Quick project!";
                } elseif ($this->hoursSpent <= 5) {
                    return "Moderate effort.";
                } else {
                    return "Major time investment!";
                }
            }
        }

        // Instantiate and output results
        $tote = new SewingProject("Tote Bag", "Canvas", 1, false, false);
        $skirt = new SewingProject("Wrap Skirt", "Rayon", 3, true, false);
        $coat = new SewingProject("Spring Coat", "Wool", 8, true, true);

        echo $tote->displaySummary() . "<br>";          // Project: Tote Bag using Canvas. Time invested: 1 hours. 
        echo "Estimated Total Time: " . $tote->estimatedTotalTime() . " hrs<br>"; // Estimated Total Time: 5 hrs
        echo $tote->needsPattern() . "<br>";            // Consider referencing a pattern for faster results.
        echo $tote->getEffortLevel() . "<br>";          // "Quick project!"
        $tote->markAsCompleted();
        echo "Completed? " . ($tote->completed ? "Yes" : "No") . "<br><br>";  // Completed? Yes

        echo $skirt->displaySummary() . "<br>";         // Project: Wrap Skirt using Rayon. Time invested: 3 hours.
        echo $skirt->getEffortLevel() . "<br><br>";     // Moderate Effort.
        
        echo $coat->displaySummary() . "<br>";          // Project: Spring Coat using Wool. Time invested: 8 hours.
        echo $coat->getEffortLevel() . "<br><br>";      // Major time investment!
    ?>
</body>
</html>
