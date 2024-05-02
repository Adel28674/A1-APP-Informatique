<!DOCTYPE html>

<?php
require '../Controller/UserManagerController.php';      
?>
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
            <a href="accueil.php">
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

    <form action="../Controller/deleteUsersController.php" method="post" id="deleteUsersForm">
        <input type="hidden" name="deleteUserMails" id="deleteUserMails">
        <button type="button" onclick="deleteSelectedUsers()">Supprimer les utilisateurs sélectionnés</button>
    </form>

    <form action="../Controller/promoteController.php" method="post" id="promoteUserForm">
        <input type="hidden" name="promoteUserMails" id="promoteUserMails">
        <button type="button" onclick="promoteSelectedUsers()">Promouvoir les utilisateurs sélectionnés</button>
    </form>

    <form action="../Controller/retrogradeUserController.php" method="post" id="retrogradeUserForm">
        <input type="hidden" name="retrogradeUserMails" id="retrogradeUserMails">
        <button type="button" onclick="retrogradeSelectedUsers()">Supprimer les utilisateurs sélectionnés</button>
    </form>
    
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
                echo '<td><input type="checkbox" name="selectedUsers" value='.$row['mail'].'></td>';
                echo "</tr>";

            }
            
            ?>



    </table>


    <script>

        function deleteSelectedUsers() {
            var selectedCheckboxes = document.querySelectorAll('input[name="selectedUsers"]:checked');
            var userMails = [];
            selectedCheckboxes.forEach(function(checkbox) {
                userMails.push(checkbox.value);
            });
            document.getElementById("deleteUserMails").value = JSON.stringify(userMails);
            document.getElementById("deleteUsersForm").submit();

        }

        function promoteSelectedUsers() {
            var selectedCheckboxes = document.querySelectorAll('input[name="selectedUsers"]:checked');
            var userMails = [];
            selectedCheckboxes.forEach(function(checkbox) {
                userMails.push(checkbox.value);
            });
            document.getElementById("promoteUserMails").value = JSON.stringify(userMails);
            document.getElementById("promoteUserForm").submit();

        }

        function retrogradeSelectedUsers() {
            var selectedCheckboxes = document.querySelectorAll('input[name="selectedUsers"]:checked');
            var userMails = [];
            selectedCheckboxes.forEach(function(checkbox) {
                userMails.push(checkbox.value);
            });
            document.getElementById("retrogradeUserMails").value = JSON.stringify(userMails);
            document.getElementById("retrogradeUserForm").submit();

        }
    </script>
    


</div>
</body>

</html>
