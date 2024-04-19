<?php
require_once "../Model/sessionGestionnaire.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Statistiques</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main-style.css">
    <link rel="stylesheet" href="../css/statistiques-style.css">
    <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
</head>
<body>
<div id='bordure_accueil'>
    <a href="accueilUser.php"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
    <a href="../Model/deconnexion.php"><input type='submit' value='Déconnexion' class='menu' name='submit_deconnexion'></a>
    <img src="../logo.png" alt="Logo de application web" class="logo" id="logo">    

    <hr>
</div>
<h1>Statistiques</h1>
<?php
$connexion = mysqli_connect('localhost', 'root', '@root123', 'PLANETCALCULATOR');
$req = mysqli_query($connexion, "SELECT count(id_ModuleSession) FROM ModuleSession");
echo '<h2>Utilisations totales: '.mysqli_fetch_assoc($req)["count(id_ModuleSession)"].'</h2>';
?>
<div id="div_content">
    <table class='table_form' cellpadding="20">
        <tr style="font-weight: bold">
            <th colspan="4"><p id="title_table" style="font-size: 20px"><u>Historique d'utilisations du module "Probabilités"</u></p></th>
        </tr>
        <tr >
            <td class="td_label"><label>Username</label></td>
            <td class="td_label"><label>Méthode</label></td>
            <td class="td_label"><label>Date d'Utilisation</label></td>
        </tr>
        <?php
        $connexion = mysqli_connect('localhost', 'root', '@root123', 'PLANETCALCULATOR');
        $req = "SELECT username, MethodName, useModuleDate FROM ModuleSession";
        $result = mysqli_query($connexion, $req);
        while ($donnees = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><label>" . $donnees['username'] . "</label></td>";
            echo "<td><label>" . $donnees['MethodName'] . "</label></td>";
            echo "<td><label>" . $donnees['useModuleDate'] . "</label></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <form style="border: none" method="post" action="genererCSV.php">
        <input type="submit" name="genererCSV" value="Générer un CSV">
    </form>
</div>
</body>
</html>
