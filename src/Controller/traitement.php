<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$username = $_POST["champ_username"];
$password = $_POST["champ_password"];

require_once '../Model/ConnectionFunctionsToDatabase.php';
$connectionFunc = new ConnectionFunc();

if (!$connectionFunc->areFieldsFilled($username, $password)) { // Vérfication: Remplissage des deux champs
    header("Location: profil.php?champ=invalid");
    exit;
}

$DB_HOSTNAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "@root123";
$DB_NAME = "PLANETCALCULATOR";
$connexion = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if (!$connectionFunc->isConnected($connexion)) { // Vérification: Connexion échouée
    header("Location: profil.php?error=" . urlencode($connexion->connect_error) . "&sqlstatus=invalide");
    exit;
} else {
    // Vérification: L'username est inscrit
    if ($state = $connexion->prepare("SELECT id_user FROM User WHERE username = ?")) {
        $state->bind_param("s",$_SESSION["id_user"]);
        $state->execute();
        $state->store_result();
        $state->bind_result($id_user); // Association de la colonne aux valeurs
        $state->fetch();
        if($state = $connexion->prepare("UPDATE User SET username = ?, password = ? WHERE id_user = ?")){
            $newPassword = password_hash($password, PASSWORD_DEFAULT);
            $state->bind_param("ssi", $username, $newPassword, $id_user);
            $state->execute();
            $_SESSION["id_user"] = $username;
            header("Location: profil.php?status=success");
            exit;
        } else {
            header("Location: profil.php?error=invalide");
            exit;
        }
    }
}