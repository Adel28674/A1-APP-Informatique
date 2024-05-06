<!DOCTYPE html>
<?php
        
        session_start();

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <div class="top-band">
    </div>
    <nav class="nav">
        <div class="logo">
            <a href="#">
                <img src="logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-links">
            <a href="services.html">Services</a>
            <a href="faq.html">FAQ</a>
            <a href="contact.html">Contact</a>
            <?php
                if($_SESSION["user"]["status"]===1){
                    echo '<a href="UserManager.php">Administration</a>';
                }
            ?>
        </div>
        <div class="button">
            <a href="profile.php" class="signup-button">Profil</a>
            <a href="../Model/deconnexion.php" class="login-button">Deconnexion</a>
        </div>
    </nav>
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
            .page {
    display: flex;
    justify-content: space-between; /* Pour répartir l'espace entre les deux éléments */
    align-items: center; /* Pour centrer verticalement les éléments */
    }

    .content-left {
    flex: 1; /* Prend autant d'espace disponible que possible */
    display: flex;
    flex-direction: column; /* Aligne les éléments verticalement */
    justify-content: center; /* Centre le contenu verticalement */
    align-items: center; /* Centre le contenu horizontalement */
    padding-right: 20px; /* Espacement entre le texte et l'image */
}


    .image-right {
    flex: 1; /* Prend autant d'espace disponible que possible */
    display: flex;
    justify-content: center; /* Centre l'image horizontalement */
    align-items: center; /* Centre l'image verticalement */
}

.centered-image {
    max-width: 100%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
}



    .buttons-container {
    display: flex;
    justify-content: center; /* Centre les éléments horizontalement */
    margin-top: 20px; /* Espacement entre le texte et les boutons */

}

.signup-button,
.login-button {
    padding: 10px 20px;
    margin-right: 10px; /* Espacement entre les boutons */
    background-color: #000000; /* Couleur de fond du bouton */
    color: #fff; /* Couleur du texte */
    text-decoration: none; /* Supprime les soulignements des liens */
    border-radius: 5px; /* Coins arrondis */
}

.login-button {
    background-color: #000000; /* Couleur de fond du bouton de connexion */
}

.sections {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .section {
            width: 80%;
            max-width: 800px;
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 50px;
        }

        .section img {
            width: 40%;
            margin-right: 20px;
            border-radius: 5px;
        }

        .section-text {
            width: 60%;
        }

        .section-text h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #0d295b;
        }

        .section-text p {
            font-size: 16px;
            color: #333;
        }

        /* Inversion du texte et de l'image */
        .section:nth-child(even) {
            flex-direction: row-reverse;
        }

        .section:nth-child(even) .section-text {
            text-align: right;
        }

        .section:nth-child(even) img {
            margin-left: 20px;
            margin-right: 0;
        }

        </style>
    </head>
    <body>
    
        <main>
            <?php
            
            echo "<h1>Bienvenue ".$_SESSION["user"]["mail"]."</h1>";
            
            ?>
            <div class="sections">
        <div class="section">
            <img src="image1.png" alt="Image 1">
            <div class="section-text">
                <h3>Capteur 1</h3>
                <p>Capteur de son.</p>
            </div>
        </div>
        <div class="section">
            <div class="section-text">
                <h3>Capteur 2</h3>
                <p>Capteur de température</p>
            </div>
            <img src="image2.png" alt="Image 2">
        </div>
        <div class="section">
            <img src="image3.png" alt="Image 3">
            <div class="section-text">
                <h3>Capteur 3</h3>
                <p>Distance de la source Sonore</p>
            </div>
        </div>
        <div class="section">
            <div class="section-text">
                <h3>Capteur 4</h3>
                <p>Triangulation</p>
            </div>
            <img src="image4.png" alt="Image 4">
        </div>
    </div>
        </main>
        
  
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll("p, a, h1, h2"); // Sélectionne tous les éléments <p> et <a> de la page
    
            elements.forEach(function(element) {
                element.addEventListener("mouseover", function() { // Ajoute un événement de survol à chaque élément
                    speakText(this); // Lit le texte de l'élément survolé
                });
            });
        });
    
        function speakText(element) {
            var textToSpeak = element.innerText;
            var utterance = new SpeechSynthesisUtterance(textToSpeak);
            window.speechSynthesis.speak(utterance);
        }
    </script>
    </body>
    </html>
    
