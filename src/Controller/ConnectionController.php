<?php

require_once '../Model/ConnectionFunctionsToDatabase.php';
$connectionFunc = new ConnectionFunc();
require_once '../Model/session.php';
$sessionFunc = new SessionFunc();
require '../Model/Connection.php';


$username = $_POST["champ_username"];
$password = $_POST["champ_password"];

if (!$connectionFunc->areFieldsFilled($username, $password)) { // Vérfication: Remplissage des deux champs
	header("Location: ../View/connexion.php?champ=invalid");
	exit;
}

if (!$connectionFunc->isConnected($connexion)) { // Vérification: Connexion échouée
// header("Location: connexion.php?error=" . urlencode($connexion->connect_error) . "&sqlstatus=invalide");
    header("Location: connexion.php?error=connexion%de%merde&sqlstatus=invalide");    
exit;
} else {

if ($state = $connexion->query("SELECT id, password FROM user WHERE username = '$username' and password='$password'")) {
    $state->execute();
    // $state->store_result();
    if (!$connectionFunc->exist($state)) {
        header("Location: connexion.php?userfound=valid");
        exit;
    } else {
        $sessionFunc->createUserSession(new User($state['id'], $state['username'], $state['password'], $state['name'], $state['firstName'], $state['mail'], $state['status']));
        header("Location: ../View/accueilUser.php");
        exit;
        // $state->bind_result($id_user, $hash); // Association de la colonne aux valeurs
	    //     $state->fetch();
        // if(password_verify($password, $hash)){
	    //         session_start();
	    //         $_SESSION["id"] = $username;
        //     header("Location: ../../utilisateur_inscrit/accueilUser/accueilUser.php");
        //     exit;
        // } else {
        //     header("Location: connexion.php?password=invalid");
        //     exit;
        // }


    }
    

}

}