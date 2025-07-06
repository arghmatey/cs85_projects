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

    // Displays contact form
    function displayForm($Sender, $Email, $Subject, $Message) {
        ?> <h2 style = "text-align:center">Contact Me</h2>
        <form name="contact" action="ContactForm.php" method="post">
            <p>Your Name:
                <input type="text" name="Sender" value="<?php echo $Sender; ?>" /></p>
            <p>Your E-mail:
                <input type="text" name="Email" value="<?php echo $Email; ?>" /></p>
            <p>Subject:
                <input type="text" name="Subject" value="<?php echo $Subject; ?>" /></p>
            <p>Message:
                <input type="text" name="Message" value="<?php echo $Message; ?>" /></p>
            <p>
                <input type="reset" value="Clear Form" />&nbsp; $nbsp;
                <input type="submit" name="Submit" value="Send Form" /></p>
        </form>
        <?php
    }
    ?>
</body>
</html>