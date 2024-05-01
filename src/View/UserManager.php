<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/UserManagerCss.css">
    

    <nav class="nav">
        <div class="logo">
            <a href="accueil.html">
                <img src="logo.png" alt="Logo" style="width: 50px;">
            </a>
        </div>
        <div class="button">
            <a href="#" class="signup-button">profil</a>
        </div>
    </nav>
</head>

<body>

<div class="container">

<?php
require '../Model/Connection.php';
require '../Model/SQLRequestFunc.php';
$lines = new SQLRequestFunc();
$lines = $lines->selectAllUsers($connexion);        
        
?>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
            <th>First Name</th>
            <th>Mail</th>
            <th>status</th>

        </tr>
        
            <?php
            
            foreach($lines as $row){
                echo" <tr>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['mail']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "</tr>";

            }
            
            ?>



    </table>
    


</div>
</body>

</html>
