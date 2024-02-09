<?php
require_once('../../session.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Module de Probabilité</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/main-style.css">
    <link rel="stylesheet" href="moduleProba-style.css">
    <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id='bordure_accueil'>
    <a href="../../utilisateur_inscrit/accueilUser/accueilUser.php"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
    <a href="../profil/profil.php"><input type='submit' value='Profil' class='menu' name='submit_profil'></a>
    <a href="../../deconnexion.php"><input type='submit' value='Déconnexion' class='menu' name='submit_deconnexion'></a>
    <img src="../../logo.png" alt="Logo de application web" class="logo" id="logo">
    <div class="div_icon_user">
        <i class="fa-regular fa-circle-user"></i>
        <?php echo '<p class="username">'.$_SESSION["id_user"].'</p>';?>
    </div>
    <hr>
</div>
<h1>Simulation de probabilités</h1>

<form action="" method="post">
    <label for="methodes">Méthodes:</label>
    <select name="methodes" size="1">
        <option value="rectangleGauche">Rectangle Gauche
        <option value="trapeze">Trapèze
        <option value="simpson">Simpson
            </select>
            <br><br>
            <label for="variance">Moyenne (m):</label>
            <input type="text" id="variance" name="variance"><br>
            <br>
            <label for="ecart_type">Écart-type (σ):</label>
            <input type="text" id="ecart_type" name="ecart_type"><br>
            <br>
            <label for="seuil">Sous la courbe (s):</label>
            <input type="text" id="seuil" name="seuil"><br>
            <br><br>
            <input type="submit" name="form_proba" value="Valider">
            <br><br>
    <?php
    require 'probaMethodes.php';

    if (isset($_POST['form_proba'])) {
        $variance = $_POST["variance"];
        $ecart_type = $_POST["ecart_type"];
        $seuil = $_POST["seuil"];
        $choix = $_POST["methodes"];
        $probaMethodes = new probaMethodes();

        $connexion = mysqli_connect('localhost', 'root', '@root123', 'PLANETCALCULATOR');
        $currentDate = date("Y-m-d H:i:s");
        switch($choix){
            case "rectangleGauche":
                $methodName = "RectangleGauche";
                $state = $connexion->prepare("INSERT INTO ModuleSession (MethodName, useModuleDate, username) VALUES (?, ?, ?)");
                $state->bind_param("sss", $methodName, $currentDate, $_SESSION["id_user"]);
                $state->execute();
                echo $probaMethodes->probaRectangleGauche($variance, $ecart_type, $seuil);
                break;
            case "trapeze":
                $methodName = "Trapeze";
                $state = $connexion->prepare("INSERT INTO ModuleSession (MethodName, useModuleDate, username) VALUES (?, ?, ?)");
                $state->bind_param("sss", $methodName, $currentDate, $_SESSION["id_user"]);
                $state->execute();
                echo $probaMethodes->probaTrapeze($variance, $ecart_type, $seuil);
                break;
            case "simpson":
                $methodName = "Simpson";
                $state = $connexion->prepare("INSERT INTO ModuleSession (MethodName, useModuleDate, username) VALUES (?, ?, ?)");
                $state->bind_param("sss", $methodName, $currentDate, $_SESSION["id_user"]);
                $state->execute();
                echo $probaMethodes->probaSimpson($variance, $ecart_type, $seuil);
                break;
            default:
                die("Erreur");
        }
    }
    ?>
        </form>

    </body>
</html>
