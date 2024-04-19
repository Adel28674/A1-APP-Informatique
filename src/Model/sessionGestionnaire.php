<?php
session_start();
if ($_SESSION["id_user"] !== "gestionnaire") {
    header("Location: ../../utilisateur_inscrit/accueilUser/accueilUser.php");
    exit;
}
?>