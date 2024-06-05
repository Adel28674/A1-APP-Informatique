<?php

session_start();

require '../Model/Connection.php';
require_once '../Model/SQLRequestFunc.php';
$SQLFunc = new SQLRequestFunc();

$id_topic = $_GET['id'];

$topic = $SQLFunc->selectTopic($id_topic, $connexion);

$messages = $SQLFunc->selectAllMessagesOfTopic($id_topic, $connexion);

$author =$SQLFunc->selectUser($topic['id_user'], $connexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['contenu'];
    $id_user = $_SESSION['user']['id'];
    $author = $_SESSION['user']['username'];

    if (!isset($_SESSION['user'])) {
        exit("Vous n'êtes pas connecté");
    }

    $SQLFunc->insertMessage($content, $id_user ,$id_topic, $author, $connexion);
    header('Location: ../View/post.php?id=' . $id_topic);
    exit;
}
?>