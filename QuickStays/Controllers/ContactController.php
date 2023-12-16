<?php
class ContactController {

    public function submit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';

            // Validate input
            if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($message)) {
                // Handle validation error
                // Redirect or display an error message
                return;
            }

            // Process the form (e.g., send an email)
            $this->sendEmail($name, $email, $subject, $message);

            // Redirect or display a success message
        } else {
            // Not a POST request, redirect or handle error
        }
    }

    private function sendEmail($name, $email, $subject, $message) {
        // Email sending logic goes here.
        // Use PHP mail function or a library like PHPMailer

        $to = 'Geno.v_@outlook.com'; // Replace with your email
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        $fullMessage = "Name: $name\nEmail: $email\nMessage: $message\n";

        if (mail($to, $subject, $fullMessage, $headers)) {
            // Email sent successfully
            // Redirect to a success page or display a success message
        } else {
            // Email failed to send
            // Redirect to an error page or display an error message
        }
    }
}
