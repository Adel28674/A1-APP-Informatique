<?php
session_start();

require 'Connection.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sense7.contact@gmail.com';
    $mail->Password = '26872416';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('from@example.com', 'Sense7');
    $mail->addAddress('elhouari.arbouz.28@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Object';
    $mail->Body = 'Bpdy';
    $mail->AltBody = 'Contenu';

    $mail->send();
    header('Location: ../View/connection.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>