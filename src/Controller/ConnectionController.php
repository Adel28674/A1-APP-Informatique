<?php
$username = $_POST["champ_username"];
$password = $_POST["champ_password"];
require_once '..\Model\ConnectionFunctionsToDatabase.php';
$connectionFunc = new ConnectionFunc();


if (!$connectionFunc->areFieldsFilled($username, $password)) { // Vérfication: Remplissage des deux champs
	header("Location: connexion.php?champ=invalid");
	exit;
}

$DB_HOSTNAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "sevensense7database";
$connexion = $connectionFunc->db_Connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if (!$connectionFunc->isConnected($connexion)) { // Vérification: Connexion échouée
header("Location: connexion.php?error=" . urlencode($connexion->connect_error) . "&sqlstatus=invalide");
exit;
} else {
// Vérification: L'username est inscrit
if ($state = $connexion->prepare("SELECT id, password FROM user WHERE username = '$username' and password='$password'")) {
    $state->execute();
    $state->store_result();
    if (!$connectionFunc->exist($state)) {
        header("Location: connexion.php?userfound=valid");
        exit;
    } else {
        session_start();
	    $_SESSION["id"] = $username;

        $state->bind_result($id_user, $hash); // Association de la colonne aux valeurs
	        $state->fetch();
        if(password_verify($password, $hash)){
	            session_start();
	            $_SESSION["id"] = $username;
            header("Location: ../../utilisateur_inscrit/accueilUser/accueilUser.php");
            exit;
        } else {
            header("Location: connexion.php?password=invalid");
            exit;
        }


    }
    

}
}

