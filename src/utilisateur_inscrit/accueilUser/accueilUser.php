<?php
require_once('../../session.php');
session_start();
if ($_SESSION["id_user"] == "gestionnaire") {
    header("Location: ../../gestionnaire/accueilGestionnaire/accueilGestionnaire.php?error=invalid");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/main-style.css">
    <link rel="stylesheet" href="accueilUser-style.css">
    <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
</head>
<body>
<div id='bordure_accueil'>
    <a href="../../utilisateur_inscrit/accueilUser/accueilUser.php"><input type='submit' value='Accueil' class='menu'
                                                                           name='submit_accueil'></a>
    <a href="../profil/profil.php"><input type='submit' value='Profil' class='menu' name='submit_profil'></a>
    <a href="../../deconnexion.php"><input type='submit' value='Déconnexion' class='menu' name='submit_deconnexion'></a>
    <img src="../../logo.png" alt="Logo de application web" class="logo" id="logo">
    <div class="div_icon_user">
        <i class="fa-regular fa-circle-user"></i>
        <?php echo '<p class="username">'.$_SESSION["id_user"].'</p>'; ?>
    </div>
    <hr>
</div>
<h1>Accueil</h1>
<fieldset>
    <div id="module_un">
        <p id="title_proba"><u>Probabilités</u></p>
        <ul class="liste_module" style="text-align: left">
            <li><label>Méthode des Rectangles Droit</label></li>
            <li><label>Méthode des Rectangles Gauche</label></li>
            <li><label>Méthode de Simpson</label></li>
            <li><label>Méthode des Trapèzes</label></li>
        </ul>
        <a href="../moduleProba/moduleProba.php">
            <i class="fa-sharp fa-solid fa-circle-arrow-right" id="i_arrow"></i>
        </a>
    </div>
</fieldset>



</body>
</html>
