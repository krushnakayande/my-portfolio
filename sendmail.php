<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are set
    if (isset($_POST['fullName']) && isset($_POST['emailAddress']) && isset($_POST['mobileNumber']) && isset($_POST['emailSubject']) && isset($_POST['message'])) {
        // Sanitize form data
        $fullName = htmlspecialchars($_POST['fullName']);
        $emailAddress = filter_var($_POST['emailAddress'], FILTER_SANITIZE_EMAIL);
        $mobileNumber = htmlspecialchars($_POST['mobileNumber']);
        $emailSubject = htmlspecialchars($_POST['emailSubject']);
        $message = htmlspecialchars($_POST['message']);

        // Email configuration
        $to = "krishnakayande@outlook.com"; // Change this to your email address
        $subject = $emailSubject;
        $messageBody = "Name: $fullName\n";
        $messageBody .= "Email: $emailAddress\n";
        $messageBody .= "Mobile: $mobileNumber\n\n";
        $messageBody .= "Message:\n$message";

        // Send email
        if (mail($to, $subject, $messageBody)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "message" => "Failed to send email. Please try again later."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "All form fields are required."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>
