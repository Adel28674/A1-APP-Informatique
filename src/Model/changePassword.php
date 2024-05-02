<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];

    $subject = "Réinitialisation de votre mot de passe";
    $message = "Bonjour,\r\n";
    $message .= "Vous avez demandé à réinitialiser votre mot de passe.\r\n";
    $message .= "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : localhost/APP/change_password.html\r\n";
    $message .= "Si vous n'avez pas demandé cette réinitialisation, veuillez ignorer ce message.\r\n";
    $message .= "Cordialement,\r\n";
    $message .= "Votre équipe de support.";

    $headers = "From: elhouari.arbouz.28@gmail.com" . "\r\n" .
               "Reply-To: elhouari.arbouz.28@gmail.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Un e-mail de réinitialisation de mot de passe a été envoyé à votre adresse e-mail.";
    } else {
        echo "Erreur lors de l'envoi de l'e-mail. Veuillez réessayer plus tard.";
    }
}
?>
