<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userMails = json_decode($_POST["retrogradeUserMails"]);
    require_once '../Model/SQLRequestFunc.php'; 
    $SQLResultFunc = new SQLRequestFunc(); 
    require '../Model/Connection.php';
    foreach($userMails as $mail){
        $SQLResultFunc->retrogradeUser($mail, $connexion);
    }
    header("Location: ../View/UserManager.php");
    exit();
}
?>
