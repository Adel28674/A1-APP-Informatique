<?php
require_once "../sessionGestionnaire.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil | Gestionnaire</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/main-style.css">
    <link rel="stylesheet" href="accueilGestionnaire-style.css">
    <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
</head>
<body>
<div id='bordure_accueil'>
    <a href="../../utilisateur_inscrit/accueilUser/accueilUser.php"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
    <a href="../../deconnexion.php"><input type='submit' value='Déconnexion' class='menu' name='submit_deconnexion'></a>
    <img src="../../logo.png" alt="Logo de application web" class="logo" id="logo">
    <hr>
</div>
<h1>Gestionnaire</h1>
<div id="div_content">
    <ul class="no-bullets">
        <li>
            <a href="../listeUtilisateurs/listeUtilisateurs.php">
                <input type='submit' value='Liste des utilisateurs' class='redirection' id="submit_liste_utilisateurs" name='submit_liste_utilisateurs'>
            </a>
        </li>
        <li>
            <a href="../statistiques/statistiques.php">
                <input type='submit' value='Statistiques' class='redirection' id="submit_stat" name='submit_stat'>
            </a>
        </li>
    </ul>

</div>
</body>
</html>

