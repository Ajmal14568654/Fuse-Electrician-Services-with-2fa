<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // CHANGE THESE ↓↓↓
        $mail->Username   = 'ajmalmohamed5307@gmail.com';
        $mail->Password   = 'mefiiwogcjigxteo'; // Gmail App Password

        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('ajmalmohamed5307@gmail.com', 'OTP System');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "<h3>Your OTP is <b>$otp</b></h3>";

        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}
?>