<?php
// Sanitize and validate input data
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
$classes = isset($_POST['classes']) ? htmlspecialchars(trim($_POST['classes'])) : '';
$timing = isset($_POST['timing']) ? htmlspecialchars(trim($_POST['timing'])) : '';
$fees = isset($_POST['fees']) ? htmlspecialchars(trim($_POST['fees'])) : '';

// Check if all required fields are provided and valid
if (!empty($name) && !empty($email) && !empty($phone) && !empty($classes) && !empty($timing) && !empty($fees) && $email !== false) {
    // Prepare email content
    $to = 'jtownstudio24@gmail.com';
    $subject = 'Class Registration - Pay Later';
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Selected Classes: $classes\n";
    $message .= "Timing: $timing\n";
    $message .= "Total Fees: $$fees\n";
    $message .= "Payment Status: Not Paid";

    // Send email
    if (mail($to, $subject, $message)) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} else {
    // Invalid or incomplete data, return error response
    http_response_code(400);
}
?>
