<?php
require_once '../Model/SQLRequestFunc.php';
$SQLFunc = new SQLRequestFunc();
require '../Model/Connection.php';

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
        $stmt = $SQLFunc->insertUser($username, $password, $name, $firstName, $email, $status, $connexion);
        $_SESSION["user"] = array(
            "username" => $username,
            "mail" => $email,
            "password" => $password,
            "name" => $name,
            "firstName" => $firstName,
            "status" => $status
        );

        header("Location: ../View/accueil.php?true=1");
        exit();
    }
}
?>
