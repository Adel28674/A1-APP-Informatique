
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inscription</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/main-style.css">
        <link rel="stylesheet" href="../css/inscription-style.css">
        <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <div id='bordure_accueil'>
            <a href="../pageBienvenue/index.php"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
            <a href="../connexion/connexion.php"><input type='submit' value='Connexion' class='menu' name='submit_connexion'></a>
            <img src="../../logo.png" alt="Logo de application web" class="logo" id="logo">
            <hr>
        </div>
        <h1>Inscription</h1>
        <form action="traitement.php" method="POST">
            <label for="champ_username">Nom d'utilisateur</label>
            <input type="text" id="champ_username" name="champ_username" required pattern="[A-Za-z0-9]+" title="Le nom d'utilisateur ne peut contenir que des lettres et chiffres"/>
            <br><br>
            <label for="champ_password">Mot de passe</label>
            <input type="password" id="champ_password" name="champ_password" required pattern="[A-Za-z0-9!@#$%^&*()_+=-]{8,}" title="Le mot de passe doit contenir au moins 8 caractères"/>
            <br><br><br>
            <?php
            // captcha

            $nb_1=rand(0, 9);
            $nb_2=rand(0, 9);


            $var_captcha = $nb_1  . "+" . $nb_2;
            echo '<div hidden><input type="hidden" name="nb_prems" value="'.$nb_1.'"><input type="hidden" name="nb_deuz" value="'.$nb_2.'"><input type="hidden" name="signe" value="+"></div>';



            echo '<label>Veuillez résoudre ce calcul</label>';
            echo '<div><input type="text" name="input_captcha" id="input_captcha" class="nb_captcha" value="'. $var_captcha.'" readonly>';
            echo '<br><input type="text" name="nb_user_captcha"  id="nb_user_captcha"  pattern="[0-9]*"  required></div>';

            ?>
            <br>
            <input type="submit" name="form_inscription" value="S'inscrire">
            <?php
            if (isset($_GET['captchastatus']) && $_GET['captchastatus'] == 'invalide') {
                echo '<p style="color: red;">Captcha invalide.</p>';
            }
            if (isset($_GET['sqlstatus']) && $_GET['sqlstatus'] == 'invalide') {
                echo '<p style="color: red;">Erreur de connexion: ' . $_GET['error'] . '</p>';
            }
            if (isset($_GET['champ']) && $_GET['champ'] == 'invalid') {
                echo '<p style="color: red;">Veuillez remplir tout les champs.</p>';
            }
            if (isset($_GET['userfound']) && $_GET['userfound'] == 'invalide') {
                echo '<p style="color: red;">L\'utilisateur existe déjà.</p>';
            }
            if (isset($_GET['error']) && $_GET['error'] == 'invalide') {
                echo '<p style="color: red;">Erreur de connexion.</p>';
            }
            ?>
        </form>
    </body>
</html>