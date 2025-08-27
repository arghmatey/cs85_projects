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
                ++$errorCount;
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
                <input type="reset" value="Clear Form" />&nbsp; &nbsp;
                <input type="submit" name="Submit" value="Send Form" /></p>
        </form>
        <?php
    }

    /* ----- Main Logic ----- */

    $ShowForm= TRUE;
    $errorCount = 0;
    $Sender = "";
    $Email = "";
    $Subject = "";
    $Message = "";

    // Validates input on form submit
    if (isset($_POST['Submit'])) {
        $Sender = validateInput($_POST['Sender'], "Your Name");
        $Email =  validateEmail($_POST['Email'], "Your E-mail");
        $Subject =  validateInput($_POST['Subject'], "Subject");
        $Message =  validateInput($_POST['Message'], "Message");

        if ($errorCount==0)
            $ShowForm = FALSE;
        else
            $ShowForm = TRUE;
    }

    // Display form if: errors, first render
    if ($ShowForm == TRUE) {
        if ($errorCount>0) 
            echo "<p>Please re-enter the form information below.</p>\n";
        displayForm($Sender, $Email, $Subject, $Message);
    }
    else {
        // Build email if all inputs are valid
        $SenderAddress = "$Sender <$Email>";
        $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

        $result = mail("recipient@example.com", $Subject, $Message, $Headers);

        if ($result)
            echo "<p>Your message has been sent. Thank you, " . $Sender . ".</p>\n";
        else
            echo "<p>There was an error sending your message, " . $Sender . ".</p>\n";
    }

    /* ----- REFLECTION ----- */
    // What does each function do? 
    //  - validateInput(): If user has entered input, trims whitespace and removes slashes. Increments error count if a field is missing.
    //  - validateEmail(): Removes all illegal characters from email address and validates it is proper email format. Incrememnts error count if email is not properly formatted.
    //  - displayForm(): Renders form HTML 
    
    // How is the user input protected? 
    //  Being a basic form, there is no security in place, but the user input is trimmed and checked for certain characters. This could protect the user from hidden harmful or escape characters. 

    // What where the most confusing parts?
    //  There was an errorCount incrememnt missing in the validateEmail() function. This caused an unexpected error.

    // What could be improved? 
    //  Style-wise I would make the message input a textbox instead to allow for bigger messages. The message could also be validated itself, to check for code or malicious text for higher security.

    // Why send a copy of the form to the sender? 
    // Sending a copy to the sender is perfect to give a user confirmation that their message was sent. It's good for tracking and to remember the details of the original message. 
    ?>
</body>
</html>