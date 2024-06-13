<?php

require_once '../Model/ConnectionFunctionsToDatabase.php';
$connectionFunc = new ConnectionFunc();
require_once '../Model/SQLRequestFunc.php';
$SQLFunc = new SQLRequestFunc();
require '../Model/Connection.php';
require_once '../Model/EncryptionFunc.php';
$EncryptionFunc = new EncryptionFunc();

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if (!$connectionFunc->areFieldsFilled($username, $password)) { // Vérfication: Remplissage des deux champs
	header("Location: ../View/connection.php?champ=invalid");
	exit;
}


if (!$connectionFunc->isConnected($connexion)) { // Vérification: Connexion échouée
    header("Location: connection.php?error=connection%de%merde&sqlstatus=invalide");    
exit;
} else {
    $hashPassword = $EncryptionFunc->hashPassword($password);
    $statement = $SQLFunc->selectUserInformation($username, $hashPassword, $connexion);
    $count = $statement->rowCount();

    if($count>=1){
        $user_data = $statement->fetch(PDO::FETCH_ASSOC);
        // echo "<script>alert(".print_r($user_data).")</script>";
        // $user = new User($user_data['id'], $user_data['username'], $user_data['password'], $user_data['name'], $user_data['firstName'], $user_data['mail'], $user_data['status']);
        $_SESSION["user"] = $user_data;
        header("Location: ../View/accueil.php");
        exit;

    }else{
        header("Location: ../View/connection.php?error=1");
        exit;
    }
}