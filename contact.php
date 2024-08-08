<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set up email headers
        $to = "amanraj78621@gmail.com"; // Your email address
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Compose email body
        $emailBody = "
        <html>
        <head>
            <title>$subject</title>
        </head>
        <body>
            <h2>New Message from $name</h2>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>";

        // Send email
        if (mail($to, $subject, $emailBody, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send the message.";
        }
    } else {
        echo "Invalid email format.";
    }
}
?>
