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
    $query = "SELECT * FROM user WHERE username = :username AND password = :password";
    $statement = $connexion->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();
    
    $count = $statement->rowCount();

    if($count>=1){
        $user_data = $statement->fetch(PDO::FETCH_ASSOC);
        $user = new User($user_data['id'], $user_data['username'], $user_data['password'], $user_data['name'], $user_data['firstName'], $user_data['mail'], $user_data['status']);
        $sessionFunc->createUserSession($user);
        header("Location: ../View/accueilUser.php");
        exit;

    }else{
        header("Location: ../View/connection.php");
        exit;
    }
}