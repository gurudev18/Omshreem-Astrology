<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your email (you receive)
    $to = "contact@omshreem-astrology.com";

    // Form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // -----------------------------
    // 1. Send Email to Site Owner
    // -----------------------------
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    $headers = "From: contact@omshreem-astrology.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    $owner_mail_sent = mail($to, $email_subject, $email_body, $headers);

    // -----------------------------
    // 2. Send Confirmation to User
    // -----------------------------
    $user_subject = "Thank you for contacting OmShreem Astrology";
    $user_body = "Hi $name,\n\n";
    $user_body .= "Thank you for reaching out! We've received your message:\n\n";
    $user_body .= "\"$message\"\n\n";
    $user_body .= "We will get back to you shortly.\n\n";
    $user_body .= "Best regards,\n";
    $user_body .= "OmShreem Astrology Team";

    $user_headers = "From: contact@omshreem-astrology.com\r\n";
    $user_headers .= "Reply-To: contact@omshreem-astrology.com\r\n";

    $user_mail_sent = mail($email, $user_subject, $user_body, $user_headers);

    // -----------------------------
    // Final Response
    // -----------------------------
    if ($owner_mail_sent && $user_mail_sent) {
        echo "Message and confirmation sent successfully!";
    } else {
        echo "Error sending message or confirmation.";
    }
}
?>
