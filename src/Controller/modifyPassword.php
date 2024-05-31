<?php
session_start();

require '../Model/Connection.php';
require_once '../Model/SQLRequestFunc.php';
$SQLFunc = new SQLRequestFunc();
require_once '../Model/EncryptionFunc.php';
$EncryptionFunc = new EncryptionFunc();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = htmlspecialchars(trim($_POST['password']));
    $email = htmlspecialchars(trim($_POST['mail']));

    $encryptPassword = $EncryptionFunc->hashPassword($password);

    $success = $SQLFunc->modifyPassword($encryptPassword, $email, $connexion);

    if ($success) {
        /* $_SESSION['user']['name'] = $name;
        $_SESSION['user']['firstName'] = $firstName;
        $_SESSION['user']['mail'] = $email; */
        
        header("Location: ../View/resetPassword.php?true=1");
        exit();
    } else {
        header("Location: ../View/resetPassword.php?false=1");
        exit();
    }
}
?>
