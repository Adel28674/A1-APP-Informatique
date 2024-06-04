<?php
require_once '../Model/SQLRequestFunc.php';
$SQLFunc = new SQLRequestFunc();
require '../Model/Connection.php';
require_once '../Model/EncryptionFunc.php';
$EncryptionFunc = new EncryptionFunc();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $firstName = $_POST['firstName'];
    
    $stmt = $SQLFunc->selectUserInformationFromMail($email, $connexion);
    
    if ($stmt->rowCount() > 0) {
        header("Location: ../View/inscription.php?error=1");
    } else {
        $hashPassword = $EncryptionFunc->hashPassword($password);
        $stmt = $SQLFunc->insertUser($username, $hashPassword, $name, $firstName, $email, $status, $connexion);
        $_SESSION["user"] = array(
            "username" => $username,
            "mail" => $email,
            "password" => $hashPassword,
            "name" => $name,
            "firstName" => $firstName,
            "status" => $status
        );

        header("Location: ../View/accueil.php?true=1");
        exit();
    }
}
?>
