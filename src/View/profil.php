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
        <title>Profil</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/main-style.css">
        <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <div id='bordure_accueil'>
        <a href="accueilUser.php"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
        <a href="#"><input type='submit' value='Profil' class='menu' name='submit_profil'></a>
        <a href="../Model/deconnexion.php"><input type='submit' value='Déconnexion' class='menu' name='submit_deconnexion'></a>
        <img src="../logo.png" alt="Logo de application web" class="logo" id="logo">
        <div class="div_icon_user">
            <i class="fa-regular fa-circle-user"></i>
            <?php echo '<p class="username">'.$_SESSION["id_user"].'</p>';?>
        </div>
        <hr>
    </div>
    <h1>Profil</h1>
    <form action="traitement.php" method="POST" style="margin-top: 7%">
        <label for="champ_username">[NOUVEAU] Nom d'utilisateur</label>
        <input type="text" id="champ_username" name="champ_username" required pattern="[A-Za-z0-9]+" title="Le nom d'utilisateur ne peut contenir que des lettres et chiffres"/>
        <br><br>
        <label for="champ_password">[NOUVEAU] Mot de passe</label>
        <input type="password" id="champ_password" name="champ_password" required pattern="[A-Za-z0-9!@#$%^&*()_+=-]{8,}" title="Le mot de passe doit contenir au moins 8 caractères"/>
        <br><br><br>
        <input type="submit" name="form_modifier" value="Modifier">
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo '<p style="color: green;">Modifications prises en compte.</p>';
        }
        if (isset($_GET['champ']) && $_GET['champ'] == 'invalid') {
            echo '<p style="color: red;">Veuillez remplir les champs.</p>';
        }
        if (isset($_GET['sqlstatus']) && $_GET['sqlstatus'] == 'invalide') {
            echo '<p style="color: red;">Erreur de connexion: ' . $_GET['error'] . '</p>';
        }
        if (isset($_GET['error']) && $_GET['error'] == 'invalide') {
            echo '<p style="color: red;">Erreur de connexion.</p>';
        }
        ?>
    </form>
	</body>
</html>
