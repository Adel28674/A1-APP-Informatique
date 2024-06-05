<?php
require '../Controller/topicController.php';

?>
<!DOCTYPE html>
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
    <style>
        /* Placez votre CSS ici si nécessaire */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
    </style>
        
</head>
<body>
<nav class="nav">
           <div class="logo">
            <a href="accueil.php">
                <img src="logo.png" alt="Logo" style="width: 50px;">
               </a>
           </div>
            <!-- <div class="nav-links">
                <a href="accueil.php">Accueil</a>
                <a href="services.html">Services</a>
                <a href="faq.html">À propos</a>
            </div> -->
           <div class="button">
               <a href="profile.php" class="signup-button">Profil</a>
           </div>
       </nav>
    
        <main>
        <div class="container-fluid px-2">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <h3><i class="fas fa-table me-1"></i>Liste des Forums</h3>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatablesSimple" width="100%"
                                cellspacing="0" data-search="true">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Id_Forum</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">date_creation</th>
                                        <th scope="col">Id_User</th>
                                        <th scope="col">Nombre_messages</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lines as $row): ?>
                                            <tr>
                                                <td><a href="post.php?id=<?= htmlspecialchars($row['id']) ?>"><?=htmlspecialchars($row['id']) ?></a></td>
                                                <td><a href="post.php?id=<?= htmlspecialchars($row['id'])?>"><?=htmlspecialchars($row['titre']) ?></a></td>
                                                <td><a href="post.php?id=<?= htmlspecialchars($row['id']) ?>"><?=htmlspecialchars($row['contenu']) ?></a></td>

                                            
                                            </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </main>
</body>
</html>
