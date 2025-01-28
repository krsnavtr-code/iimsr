<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


// Function to send an email with PHPMailer
function sendEmailWithPHPMailer($to, $subject, $message , $files = array(), $senderEmail = 'info@iimsr.net.in', $senderName = 'Imperial Institute of Management Science & Research') {
    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@iimsr.net.in';  // SMTP username
        $mail->Password   = 'Kieron@123';         // SMTP password
        $mail->SMTPSecure = 'ssl';                // Enable SSL encryption
        $mail->Port       = 465;                  // TCP port to connect to

        // Recipients
        $mail->setFrom($senderEmail, $senderName);
        $mail->addAddress($to);   // Add a recipient

        // Attachments
        if (!empty($files)) {
            foreach ($files as $file) {
                if (is_file($file)) {
                    $mail->addAttachment($file);
                }
            }
        }

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
          // You can uncomment the next line to debug the error message
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>
