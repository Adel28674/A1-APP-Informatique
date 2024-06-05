<?php
require_once '../Model/Connection.php';
require_once '../Model/SQLRequestFunc.php';
$SQLFunc = new SQLRequestFunc();

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];


    if (empty($titre)) {
        echo "Veuillez mettre un titre";
        exit;
    }

    try {
        
        $SQLFunc->createTop($titre, $contenu, $_SESSION['user']['id'], $connexion);
        header('Location: ../View/topics.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    echo "Méthode de requête non autorisée.";
}
