<?php
require_once 'traitementMethodes.php';
$traitementMethodes = new traitementMethodes();

$username = $_POST["champ_username"];
$password = $_POST["champ_password"];

$nb1 = $_POST['nb_prems'];
$nb2 = $_POST['nb_deuz'];
$signe = "+";
$reponse_captcha = $_POST['nb_user_captcha'];
$valeur_exact_captcha = $nb1 + $nb2;

if (!$traitementMethodes->champsRemplis($username, $password)) { // Vérfication: Remplissage des deux champs
    header("Location: inscription.php?champ=invalid");
    exit;
}else{
    if (!$traitementMethodes->captchaValide($valeur_exact_captcha,$reponse_captcha)) { // Vérification: Validité du CAPTCHA
        header("Location: inscription.php?captchastatus=invalide");
        exit;

    }else{
        $username = htmlspecialchars($_POST["champ_username"]);
        $password = htmlspecialchars($_POST["champ_password"]);

        $DB_HOSTNAME = "localhost";
        $DB_USERNAME = "root";
        $DB_PASSWORD = "@root123";
        $DB_NAME = "PLANETCALCULATOR";

        $connexion = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
        if (!$traitementMethodes->connexionDatabaseReussie($connexion)) { // Vérification: Connexion échouée
            header("Location: formulaire.php?error=" . urlencode($connexion->connect_error) . "&sqlstatus=invalide");
            exit;
        } else {
            // Vérification: L'username n'est pas déjà en base de données
            if ($state = $connexion->prepare("SELECT id_user, password FROM User WHERE username = ?")) {
                $state->bind_param("s", $username);
                $state->execute();
                $state->store_result();
                if (!$traitementMethodes->utilisateurNonInscrit($state)) {
                    header("Location: inscription.php?userfound=invalide");
                    exit;
                } else {
                    // Insertion des valeurs en base de données
                    if ($state = $connexion->prepare("INSERT INTO User (username, password) VALUES (?, ?)")) {
                        // On utilise password_hash pour crypter le mot de passe avec l"algorithme PASSWORD_DEFAULT
                        $password = password_hash($_POST["champ_password"], PASSWORD_DEFAULT);
                        $state->bind_param("ss", $username, $password);
                        $state->execute();
                        $state->close();
                        header("Location: ../connexion/connexion.php?registrationstatus=valide&uname=".urlencode($username));
                        exit;
                    } else {
                        header("Location: inscription.php?error=invalide");
                        exit;
                    }
                }
            }
        }
    }
}




?>
