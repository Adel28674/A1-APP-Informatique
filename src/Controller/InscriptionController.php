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

        header("Location: ../View/accueil.html?true=1");
        exit();
    }
}
?>
