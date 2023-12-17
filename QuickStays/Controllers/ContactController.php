<?php
class ContactController {

    public function submit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';

            
            if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($message)) {
                
                return;
            }

            
            $this->sendEmail($name, $email, $subject, $message);

            
        } else {
           
        }
    }

    private function sendEmail($name, $email, $subject, $message) {
        

        $to = 'Geno.v_@outlook.com'; 
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        $fullMessage = "Name: $name\nEmail: $email\nMessage: $message\n";

        if (mail($to, $subject, $fullMessage, $headers)) {
            
        } else {
            
        }
    }
}
