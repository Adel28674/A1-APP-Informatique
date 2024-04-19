<?php
require_once "../Model/sessionGestionnaire.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste Utilisateurs</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/listeUtilisateurs-style.css">
    <link rel="stylesheet" href="../css/main-style.css">
    <script src="https://kit.fontawesome.com/d8f5b6c63c.js" crossorigin="anonymous"></script>
</head>
<body>
<div id='bordure_accueil'>
    <a href="accueilUser.php"><input type='submit' value='Accueil' class='menu' name='submit_accueil'></a>
    <a href="../Model/deconnexion.php"><input type='submit' value='Déconnexion' class='menu' name='submit_deconnexion'></a>
    <img src="../logo.png" alt="Logo de application web" class="logo" id="logo">

    <hr>
</div>
<div id="div_content">
    <p id="title">Liste des utilisateurs</p>
    <table class='table_form' cellpadding="20">

        <tr style="background-color: #bfbfbf">
            <td class="td_label"><label class="title_tableau">Username</label></td>
            <td class="td_label"><label class="title_tableau">Supprimer</label></td>
        </tr>
        <?php
        $connexion = mysqli_connect('localhost', 'root', '@root123', 'PLANETCALCULATOR');
        if(isset($_POST['supprimer'])) {
            $username = $_POST['username'];
            $req = $connexion->prepare('DELETE FROM User WHERE username = ?');
            $req->bind_param("s", $username);
            $req->execute();
            header("Location: listeUtilisateurs.php");
            exit;
        }
        $req = "SELECT username FROM User";
        $result = mysqli_query($connexion, $req);
	    while ($donnees = mysqli_fetch_assoc($result)) {
            if($donnees["username"]=='gestionnaire'){
                continue;
            }
            echo "<tr>";
            echo "<td><label>" . $donnees['username'] . "</label></td>";
            echo "<td>";

            echo "<form style='border: none' method='post' onsubmit='return confirm(\"Voulez-vous vraiment supprimer cet utilisateur ?\")'>";
            echo "<input type='hidden' name='username' value='" . $donnees['username'] . "' />";
            echo "<button type='submit' name='supprimer' class='delete-btn'><i class='fa-sharp fa-solid fa-circle-xmark'></i></button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
