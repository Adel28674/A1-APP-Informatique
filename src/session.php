<?php
session_start();
//Verification de la connexion user
if (empty($_SESSION["id_user"])) {
    header("Location: ../../visiteur/pageBienvenue/index.php");
    exit;
}
?>
