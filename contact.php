<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Create a PHPMailer object
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // You can change this to DEBUG_SERVER for more information
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'keanuh20org@gmail.com'; // Your SMTP username
        $mail->Password = 'HomeSweetHome2022@'; // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Sender and recipient settings
        $mail->setFrom('keanuh20org@gmail.com', 'Keanu.Dev system');
        $mail->addAddress('keanu@gameunit.nl', 'Keanu van der Bie');

        // Email content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "You have received a new contact form submission from $name ($email):\n\n$message";

        // Send email
        $mail->send();

        // Redirect back to the contact form with a success message
        header("Location: contact.php?success=true");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If the form wasn't submitted via POST, redirect back to the contact form
    header("Location: contact.php");
}
?>
