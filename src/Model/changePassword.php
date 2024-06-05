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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sense7.contacts@gmail.com';
        $mail->Password = 'dgamzruiqnuldwfe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('sense7.contacts@gmail.com', 'Sense7');
        $mail->addAddress($email); 

        $reset_link = "http://localhost/A1-APP-Informatique/src/View/resetPassword.php";

        $mail->isHTML(true);
        $mail->Subject = 'Réinitialisation du mot de passe';
        $mail->Body = "
        <html>
        
        <head>
        <meta charset='UTF-8'>
        <title>Réinitialisation du mot de passe</title>
        </head>
        <body>
            <p>Bonjour,</p>
            <p>Cliquez sur le lien suivant pour réinitialiser votre mot de passe :</p>
            <p><a href='$reset_link'>Réinitialiser le mot de passe</a></p>
            <p>Si vous n'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer cet email.</p>
            <p>Cordialement,<br>L'équipe Sense7</p>
        </body>
        </html>
        ";
        $mail->AltBody = 'Bonjour, Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ' . $reset_link . ' Si vous n\'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer cet email. Cordialement, L\'équipe Sense7';

        $mail->send();
        header('Location: ../View/forgotPassword.php?true=1');
    } else {
        echo "Veuillez soumettre le formulaire.";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
