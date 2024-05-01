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
        echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
    } else {
        $stmt = $SQLFunc->insertUser($username, $password, $name, $firstName, $email, $status, $connexion);

        header("Location: ../View/accueil.html");
        exit();
    }
}
?>
