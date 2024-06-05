<!DOCTYPE html>
<?php
require '../Controller/UserManagerController.php';
?>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inscription</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <link href="css/style.min.css" rel="stylesheet" />
    <link href="css/styles_bootstrap.css" rel="stylesheet" />
    <script src="js/all.js" crossorigin="anonymous"></script>
</head>

<body>
<nav class="nav">
           <div class="logo">
            <a href="accueil.php">
                <img src="logo.png" alt="Logo" style="width: 50px;">
               </a>
           </div>
            <div class="nav-links">
                <a href="accueil.php">Accueil</a>
                <a href="services.html">Services</a>
                <a href="contact.php">Contact</a>
                <a href="faq.html">À propos</a>
            </div>
           <div class="button">
               <a href="profile.php" class="signup-button">Profil</a>
           </div>
       </nav>

    <form action="../Controller/deleteUsersController.php" method="post" id="deleteUsersForm" class="action-form">
        <input type="hidden" name="deleteUserMails" id="deleteUserMails">
        <button type="button" onclick="deleteSelectedUsers()">Supprimer les utilisateurs sélectionnés</button>
    </form>

    <form action="../Controller/promoteController.php" method="post" id="promoteUserForm" class="action-form">
        <input type="hidden" name="promoteUserMails" id="promoteUserMails">
        <button type="button" onclick="promoteSelectedUsers()">Promouvoir les utilisateurs sélectionnés</button>
    </form>

    <form action="../Controller/retrogradeUserController.php" method="post" id="retrogradeUserForm" class="action-form">
        <input type="hidden" name="retrogradeUserMails" id="retrogradeUserMails">
        <button type="button" onclick="retrogradeSelectedUsers()">Rétrograder les utilisateurs sélectionnés</button>
    </form>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-2">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <h3><i class="fas fa-table me-1"></i>Liste des utilisateurs</h3>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatablesSimple" width="100%"
                                cellspacing="0" data-search="true">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Mail</th>
                                        <th scope="col">status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lines as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['password'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['firstName'] . "</td>";
                                        echo "<td>" . $row['mail'] . "</td>";
                                       if($row['status']==1){
                                        echo "<td>Admin</td>";
                                       }else{
                                        echo "<td>User</td>";
                                       }
                                        echo '<td><input type="checkbox" name="selectedUsers" value=' . $row['mail'] . '></td>';
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                                </main>
                                </div>
            <script>
                function deleteSelectedUsers() {
                    var selectedCheckboxes = document.querySelectorAll('input[name="selectedUsers"]:checked');
                    var userMails = [];
                    selectedCheckboxes.forEach(function (checkbox) {
                        userMails.push(checkbox.value);
                    });
                    document.getElementById("deleteUserMails").value = JSON.stringify(userMails);
                    document.getElementById("deleteUsersForm").submit();
                }

                function promoteSelectedUsers() {
                    var selectedCheckboxes = document.querySelectorAll('input[name="selectedUsers"]:checked');
                    var userMails = [];
                    selectedCheckboxes.forEach(function (checkbox) {
                        userMails.push(checkbox.value);
                    });
                    document.getElementById("promoteUserMails").value = JSON.stringify(userMails);
                    document.getElementById("promoteUserForm").submit();
                }

                function retrogradeSelectedUsers() {
                    var selectedCheckboxes = document.querySelectorAll('input[name="selectedUsers"]:checked');
                    var userMails = [];
                    selectedCheckboxes.forEach(function (checkbox) {
                        userMails.push(checkbox.value);
                    });
                    document.getElementById("retrogradeUserMails").value = JSON.stringify(userMails);
                    document.getElementById("retrogradeUserForm").submit();
                }
            </script>

            <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="js/datatables-simple-demo.js"></script>
            <script src="js/simple-datatables.min.js" crossorigin="anonymous"></script>

</body>

</html>