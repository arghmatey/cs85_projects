<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Contact Form</title>
</head>
<body>
    <?php
    function displayForm(){
        ?>
            <form method="POST" action="">
                <p>
                    <label for="fullName">Full Name:</label><br />
                    <input type="text" name="fullName" id="fullName" required>
                </p>
                <p>
                    <label for="email">Email Adress:</label><br />
                    <input type="email" name="email" id="email" required>
                </p>
                <p>
                    <label for="topic">Topic:</label><br />
                    <input type="text" name="topic" id="topic" required>
                </p>
                <p>
                    <label for="message">Message:</label><br />
                    <textarea name="message" id="message" rows="4" required></textarea>
                </p>
                <input type="submit" value="Send Message" />
            </form>
        <?php
    }

    $fullName = "";
    $email = "";
    $topic = "";
    $message = "";
    $errorCount = 0;

    function displayConfirmation($fullName, $email, $topic) {
        echo "<p> Thank you, $fullName! We received your message about: \"$topic\"</p>";
        echo "<p>We'll get back to you at $email.</p>"; 
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullName = htmlspecialchars($_POST['fullName']);
        $email = htmlspecialchars($_POST['email']);
        $topic = htmlspecialchars($_POST['topic']);
        $message = htmlspecialchars($_POST['message']);

        // Temporary raw results
        displayConfirmation($fullName, $email, $topic);
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $errorCount > 0) {
        displayForm();
    }
    ?>

</body>
</html>