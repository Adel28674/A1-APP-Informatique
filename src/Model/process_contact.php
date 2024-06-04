<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sense7.contacts@gmail.com';
        $mail->Password = 'dgamzruiqnuldwfe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('sense7.contacts@gmail.com', 'Sense7');
        $mail->addAddress($email); 

        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de contact';
        $mail->Body = "
        <html>
        <head>
            <title>Nouveau message de contact</title>
        </head>
        <body>
            <p>Vous avez reçu un nouveau message de contact.</p>
            <p><strong>Nom :</strong> {$name}</p>
            <p><strong>Email :</strong> {$email}</p>
            <p><strong>Message :</strong><br>{$message}</p>
        </body>
        </html>
        ";
        $mail->AltBody = "Vous avez reçu un nouveau message de contact.\n\nNom: {$name}\nEmail: {$email}\nMessage:\n{$message}";

        $mail->send();
        header('Location: ../View/contact.php?true=1'); 
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur Mailer : {$mail->ErrorInfo}";
    }
} else {
    echo "Veuillez soumettre le formulaire.";
}
?>
