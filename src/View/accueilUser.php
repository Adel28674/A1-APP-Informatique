<?php
// require_once('../../session.php');
// session_start();
// if ($_SESSION["id_user"] == "gestionnaire") {
//     header("Location: ../../gestionnaire/accueilGestionnaire/accueilGestionnaire.php?error=invalid");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main-style.css">
    <link rel="stylesheet" href="../css/accueilUser-style.css">
    <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
</head>
<body>
<div id='bordure_accueil'>
    <a href="#"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
    <a href="profil.php"><input type='submit' value='Profil' class='menu' name='submit_profil'></a>
    <a href="../Model/deconnexion.php"><input type='submit' value='Déconnexion' class='menu' name='submit_deconnexion'></a>
    <img src="../logo.png" alt="Logo de application web" class="logo" id="logo">
    <div class="div_icon_user">
        <i class="fa-regular fa-circle-user"></i>
        <?php echo '<p class="username">'.$_SESSION["id"].'</p>'; ?>
    </div>
    <hr>
</div>
<h1>Accueil</h1>
<fieldset>
    <div id="module_un">
        
    </div>
</fieldset>



</body>
</html>
