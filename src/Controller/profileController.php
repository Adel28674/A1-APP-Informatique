<?php
session_start();

include_once "../Model/Connection.php"; 

if (!isset($_SESSION['user'])) {
    exit("Vous n'êtes pas connecté");
}

$user_email = $_SESSION['user']['mail'];

$stmt = $connexion->prepare("SELECT * FROM `user` WHERE `mail` = ?");
$stmt->execute([$user_email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    exit("Utilisateur non trouvé");
}
?>
