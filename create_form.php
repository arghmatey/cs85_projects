<!-- SARAH HAMILTON -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Contact Form</title>
</head>
<body>
    <?php

    function validateInput ($data, $fieldName, $minWords = 1, $maxWords = null) {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field.<br /> \n";
            ++$errorCount;
            $retval = "";
        } else if (!is_null($maxWords) && str_word_count($data) >= $maxWords) { 
            echo "\"$fieldName\" must not exceed $maxWords words.<br /> \n";
            ++$errorCount;
            $retval = "";
        } else if ($minWords > 1 && str_word_count($data) <= $minWords) { 
            echo "\"$fieldName\" must be at least $minWords words.<br /> \n";
            ++$errorCount;
            $retval = "";
        } else {
            $retval =  htmlspecialchars(trim(stripslashes($data)));
        }

        return($retval);
    }

    function validateEmail($data, $fieldName) {
        global $errorCount;
            if (empty($data)) {
                echo "\"$fieldName\" is a required field.<br /> \n";
                ++$errorCount;
                $retval = "";
        }
        else {
            $retval = filter_var($data, FILTER_SANITIZE_EMAIL);

            if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
                echo "\"$fieldName\" is not a valid e-mail address.<br />\n";
                ++$errorCount;
            }
        }

        return htmlspecialchars($retval);
    }

    function displayForm($FullName, $Email, $Topic, $Message){
        ?>
            <form method="POST" action="">
                <p>
                    <label for="fullName">Full Name:</label><br />
                    <input type="text" name="fullName" id="fullName" <?php echo $FullName; ?>/>
                </p>
                <p>
                    <label for="email">Email Address:</label><br />
                    <input type="email" name="email" id="email" <?php echo $Email; ?>/>
                </p>
                <p>
                    <label for="topic">Topic:</label><br />
                    <input type="text" name="topic" id="topic" <?php echo $Topic; ?>/>
                </p>
                <p>
                    <label for="message">Message:</label><br />
                    <textarea name="message" id="message" rows="4"><?php echo $Message; ?></textarea>
                </p>
                <input type="submit" value="Send Message" />
            </form>
        <?php
    }

    $ShowForm = TRUE;
    $FullName = "";
    $Email = "";
    $Topic = "";
    $Message = "";
    $errorCount = 0;

    function displayConfirmation($fullName, $email, $topic) {
        echo "<p> Thank you, $fullName! We received your message about: \"$topic\"</p>";
        echo "<p>We'll get back to you at $email.</p>"; 
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullName = validateInput($_POST['fullName'], "Full Name");
        $email = validateEmail($_POST['email'], "Email Address");
        $topic = validateInput($_POST['topic'], "Topic");
        $message = validateInput($_POST['message'], "Message", 50, 150);

        if ($errorCount == 0) {
            $ShowForm = FALSE;
            displayConfirmation($fullName, $email, $topic);
        } else
            $ShowForm = TRUE;
    }

    if ($ShowForm) {
        if ($errorCount > 0) 
            echo "<p>Please re-enter the form information below.</p>\n";
        displayForm($FullName, $Email, $Topic, $Message);
    }

    /* 
    Output Predictions: 
        - Confirmation / thank you message if all inputs pass validation
        - Error message with form still displayed if validation fails

    Expected $_POST:
        - Object with keys: fullName, email, topic, message
    
    Relfections: 
        - There are a few parts in the validation that seemed to get crowded. I decided to try making it as DRY as possible.
        - I originally did not have the user data persist on error which was inconvenient on testing (which pointed out how it would also be inconvenient for users)
    */
    ?>
</body>
</html>