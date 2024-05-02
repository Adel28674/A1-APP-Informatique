<?php
session_start();

require '../Model/Connection.php';
require_once '../Model/SQLRequestFunc.php';
$SQLFunc = new SQLRequestFunc();

if (!isset($_SESSION['user'])) {
    exit("Vous n'êtes pas connecté");
}

$user_email = $_SESSION['user']['mail'];

$stmt = $SQLFunc->selectUserInformationFromMail($user_email, $connexion);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    exit("Utilisateur non trouvé");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $firstName = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));

    $success = $SQLFunc->modifyInformations($name, $firstName, $email, $user_email, $connexion);

    if ($success) {
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['firstName'] = $firstName;
        $_SESSION['user']['mail'] = $email;
        
        header("Location: ../View/modifyPage.php?true=1");
        exit();
    } else {
        header("Location: ../View/modifyPage.php?false=1");
        exit();
    }
}
?>
