<?php
session_start();
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
    <script src="js/all.js" crossorigin="anonymous"></script>
    <style>
        .text-container {
                padding: 20px;
            }
    
            .text-container h2 {
                font-size: 24px;
                margin-bottom: 10px;
            }
    
            .text-container p {
                font-size: 16px;
                line-height: 1.6;
                cursor: pointer; /* Ajout d'un curseur pointer pour indiquer qu'il est possible de survoler le texte */
            }
    
            .nav-links a {
                cursor: pointer; /* Ajout d'un curseur pointer pour les liens de navigation */
            }
            .faq {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .faq-item {
            width: 80%;
            max-width: 600px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .faq-item:hover {
            background-color: #e6e6e6;
        }

        .faq-item h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #0d295b;
        }

        .faq-item p {
            display: none;
            font-size: 16px;
            color: #333;
        }

        .faq-item:hover p {
            display: block;
        }
        
    </style>
        
</head>
<body>
<nav class="nav">
        <div class="logo">
            <a href="accueil.php">
                <img src="logo.png" alt="Logo" width="100px">
            </a>
        </div>
        <div class="nav-links">
            <a href="services.html">Services</a>
            <a href="faq.php">FAQ</a>
            <a href="contact.php">Contact</a>
            <a href="topics.php">Forum</a>
            <?php
            if ($_SESSION["user"]["status"] === 1) {
                echo '<a href="UserManager.php">Administration</a>';
            }
            ?>
        </div>
        <div class="button">
            <a href="profile.php" class="signup-button">Profil</a>
            <a href="../Model/deconnexion.php" class="login-button">Deconnexion</a>
        </div>
    </nav>
    
        <main>
        <div class="faq">
            <button onclick="redirectToCreationTopic()" id="createTop"><style>#createTop {
                    padding: 10px 20px;
                    margin-left: 20px;
                    margin-bottom: 20px;
                    background-color: #0d295b;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                }</style> 
                Créer un topic    
            </button>
            <?php foreach ($lines as $row): ?>
                    <div class="faq-item">
                        <h3><a style="color: inherit; text-decoration: none;" href="post.php?id=<?= htmlspecialchars($row['id'])?>"><?=htmlspecialchars($row['titre']) ?></h3>
                        <p><a style="color: inherit; text-decoration: none;" href="post.php?id=<?= htmlspecialchars($row['id'])?>"><?=htmlspecialchars($row['contenu']) ?> </p>
                    </div>
            <?php endforeach; ?>            
        </div>

        </main>
    
        <footer>
        <style>
            *{
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
    box-sizing: border-box;
}

body{
    background: #eef8ff;
}

footer{
    width: 100%;
    position: relative;
    bottom: 0;
    background: #0d295b;
    color: #fff;
    padding: 50px 0 20px;
    border-top-left-radius: 50px ;
    font-size: 12px;
    line-height: 18px;
}

.row{
    width: 85%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: space-between;
}

.col{
    flex-basis: 25%;
    padding: 10px;
}

.col:nth-child(2), .col:nth-child(3){
    flex-basis: 15%;
}

.logo{
    width: 60px;
    margin-bottom: 20px;
}

.col h3{
    width: fit-content;
    margin-bottom: 20px;
    position: relative;
}

.email-id{
    width: fit-content;
    border-bottom: 1px solid #ccc;
    margin: 10px 0;
}

ul li {
    list-style: none;
    margin-bottom: 8px;
}

ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 12px;
}

form{
    padding-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #ccc;
    margin-bottom: 30px;
}

form .far{
    font-size: 16px;
    margin-right: 8px;
}

form input{
    width: 70%;
    background: transparent;
    color: #ccc;
    border: 0;
    outline: none;
}

form button{
    background: transparent;
    border: 0;
    outline: none;
    cursor: pointer;
}

form button .fas{
    font-size: 14px;
    color: #ccc;
}

.social-icons .fab{
    width: 30px; /* Reduced icon size */
    height: 30px; /* Reduced icon size */
    border-radius: 50%;
    text-align: center;
    line-height: 30px; /* Reduced line height */
    font-size: 14px; /* Reduced font size */
    color: #000;
    background: #fff;
    margin-right: 10px; /* Reduced margin */
    cursor: pointer;
}

hr{
    width: 90%;
    border: 0;
    border-bottom: 1px solid #ccc;
    margin: 10px auto; /* Reduced margin */
}

.copyright{
    text-align: center;
}

.underline{
    width: 100%;
    height: 5px;
    background: #767676;
    border-radius: 3px;
    position: absolute;
    top: 25px;
    left: 0;
    overflow: hidden;
}

.underline span{
    width: 15px;
    height: 100%;
    background: #fff;
    border-radius: 3px;
    position: absolute;
    top: 0;
    left: 10px;
    animation: moving 2s linear infinite;
}

@keyframes moving{
    0%{
        left: -20px;
    }
    100%{
        left: 100%;
    }
}

@media (max-width: 700px){
    footer{
        bottom: unset;
    }
    .col{
        flex-basis: 100%;
    }
    
    .col:nth-child(2), .col:nth-child(3){
        flex-basis: 15%;
    }
}
        </style>
        <div class="row">
            <div class="col">
                <img src="logo.png" class="logo">
            </div>
            <div class="col">
                <h3>Bureau <div class="underline"><span></span></div></h3>
                <p>Campus Notre-Dame-de-Lorette (NDL)</p>
                <br>
                <p>10, rue de Vanves, 92130 Issy-les-Moulineaux</p>
                <p class="email-id">g7e@isep.com</p>
                <h4>+333333333333</h4>
            </div>
            <div class="col">
                <h3>Liens <div class="underline"><span></span></div></h3>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="Services.html">Services</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>Newsletter <div class="underline"><span></span></div></h3>
                <form>
                    <i class="far fa-envelope"></i>
                    <input type="email" placeholder="Entrer ton mail" required>
                    <button type="submit"><i class="fas fa-arrow-right"></i></button>
                </form>
                <div class="social-icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-whatsapp"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright">SEN7SE © 2024- All Rights Reserved</p>
    </footer>

    <script>

        function redirectToCreationTopic() {
                    window.location.href = "creationTopic.php";
                }
    </script>

</body>
</html>
