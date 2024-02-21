<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Construct email
    $to = "krishnakayande@outlook.com"; // Your email address
    $subject = "New Contact Form Submission: " . $subject;
    $body = "Name: " . $fullName . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Phone: " . $phone . "\n";
    $body .= "Message: " . $message;

    // Send email
    $result = mail($to, $subject, $body);

    // Return result
    if ($result) {
        echo "Email sent successfully";
    } else {
        echo "Failed to send email";
    }
}
?>
