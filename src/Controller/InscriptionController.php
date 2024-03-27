<?php
require_once '../Model/InscriptionFunc.php';
require '../Model/Connection.php';

$inscriptionFunc = new InscriptionFunc();

$username = $_POST["champ_username"];
$password = $_POST["champ_password"];

$nb1 = $_POST['nb_prems'];
$nb2 = $_POST['nb_deuz'];
$signe = "+";
$reponse_captcha = $_POST['nb_user_captcha'];
$valeur_exact_captcha = $nb1 + $nb2;

if (!$inscriptionFunc->fieldsFilled($username, $password)) { // Vérfication: Remplissage des deux champs
    header("Location: ../View/inscription.php?champ=invalid");
    exit;
}else{
    if (!$inscriptionFunc->captchaValide($valeur_exact_captcha,$reponse_captcha)) { // Vérification: Validité du CAPTCHA
        header("Location: ../View/inscription.php?captchastatus=invalide");
        exit;

    }else{
        $username = htmlspecialchars($_POST["champ_username"]);
        $password = htmlspecialchars($_POST["champ_password"]);

        
        if (!$inscriptionFunc->isConnected($connexion)) { // Vérification: Connexion échouée
            header("Location: ../View/formulaire.php?error=" . urlencode($connexion->connect_error) . "&sqlstatus=invalide");
            exit;
        } else {
            // Vérification: L'username n'est pas déjà en base de données
            if ($state = $connexion->prepare("SELECT id, password FROM user WHERE username = ?")) {
                $state->bind_param("s", $username);
                $state->execute();
                $state->store_result();
                if (!$inscriptionFunc->utilisateurNonInscrit($state)) {
                    header("Location: ../View/inscription.php?userfound=invalide");
                    exit;
                } else {
                    // Insertion des valeurs en base de données
                    if ($state = $connexion->prepare("INSERT INTO User (username, password) VALUES (?, ?)")) {
                        // On utilise password_hash pour crypter le mot de passe avec l"algorithme PASSWORD_DEFAULT
                        //$password = password_hash($password, PASSWORD_DEFAULT);
                        $state->bind_param("ss", $username, $password);
                        $state->execute();
                        $state->close();
                        header("Location: ../View/connexion.php?registrationstatus=valide&uname=".urlencode($username));
                        exit;
                    } else {
                        header("Location: ../View/inscription.php?error=invalide");
                        exit;
                    }
                }
            }
        }
    }
}




?>
