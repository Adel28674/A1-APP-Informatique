<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/main-style.css">
        <link rel="stylesheet" href="../css/connexion-style.css">
    </head>
    <body>
        <div id='bordure_accueil'>
            <a href="../pageBienvenue/index.php"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
            <a href="../inscription/inscription.php"><input type='submit' value='Inscription' class='menu' name='submit_inscription'></a>
            <img src="../../logo.png" alt="Logo de application web" class="logo" id="logo">
            <hr>
        </div>
        <h1>Connexion</h1>
        <form action="traitement.php" method="POST">
            <label for="champ_username">Nom d'utilisateur</label>
            <input type="text" id="champ_username" name="champ_username" required pattern="[A-Za-z0-9]+" title="Le nom d'utilisateur ne peut contenir que des lettres et chiffres"/>
            <br><br>
            <label for="champ_password">Mot de passe</label>
            <input type="password" id="champ_password" name="champ_password" required />
            <br>
            <p id="btn_mot_de_passe_oublie"><u>Mot de passe oublié</u></p>
            <script>
                document.getElementById("btn_mot_de_passe_oublie").addEventListener("click", function() {
                    window.location.href = "pageconstruction.php";
                });
            </script>
            <br>
            <input type="submit" name="form_connexion" value="Valider">
            <?php
            if (isset($_GET['registrationstatus']) && $_GET['registrationstatus'] == 'valide') {
                echo '<p style="color: green;">Utilisateur inscrit: ' . $_GET['uname'] . '</p>';
            }
            if (isset($_GET['sqlstatus']) && $_GET['sqlstatus'] == 'invalide') {
                echo '<p style="color: red;">Erreur de connexion: ' . $_GET['error'] . '</p>';
            }
            if (isset($_GET['champ']) && $_GET['champ'] == 'invalid') {
                echo '<p style="color: red;">Veuillez remplir tout les champs.</p>';
            }
            if (isset($_GET['userfound']) && $_GET['userfound'] == 'valid') {
                echo '<p style="color: red;">Utilisateur inconnu.</p>';
            }
            if (isset($_GET['password']) && $_GET['password'] == 'invalid') {
                echo '<p style="color: red;">Mot de passe invalide.</p>';
            }
            ?>
        </form>
    </body>
</html>

