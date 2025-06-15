<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "mrgurudev1892@gmail.com"; // ✅ Change to your real email

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $email_subject = "Website Contact: $subject";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // ✅ Recommended: Use your domain email as sender
    $headers = "From: info@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed. Check mail setup.";
    }
}
?>
