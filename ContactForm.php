<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
</head>
<body>
    <?php

    // Validates general input: name, subject, message
    function validateInput ($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field.<br /> \n";
            ++$errorCount;
            $retval = "";
        }
        else {  // Only clean up the input if it isn't empty
            // Cleans input: removes whitespace and slashes
            $retval = trim($data);
            $retval = stripslashes($retval);
        }

        return($retval); // Returns: cleaned up or empty value
    }

    // Validates email input
    function validateEmail($data, $fieldName) {
        global $errorCount;
                if (empty($data)) {
            echo "\"$fieldName\" is a required field.<br /> \n";
            ++$errorCount;
            $retval = "";
        }
        else {
            // Sanitize and validate email format
            $retval = filter_var($data, FILTER_SANITIZE_EMAIL);

            if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
                echo "\"$fieldName\" is not a valid e-mail address.<br />\n";
            }
        }

        return($retval);
    }
    ?>
</body>
</html>