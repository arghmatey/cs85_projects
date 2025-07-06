<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Contact Form</title>
</head>
<body>
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
            <label for="subject">Subject:</label><br />
            <input type="text" name="subject" id="subject" required>
        </p>
        <p>
            <label for="message">Message:</label><br />
            <textarea name="message" id="message" rows="4" required></textarea>
        </p>
        <input type="submit" value="Send Message" />
    </form>
</body>
</html>