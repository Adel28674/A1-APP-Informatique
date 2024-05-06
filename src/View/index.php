<!DOCTYPE html>
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
            <a href="accueil.html">
                <img src="logo.png" alt="Logo">
            </a>
        </div>
        <!-- <div class="nav-links">
            <a href="services.html">Services</a>
            <a href="faq.html">À propos</a>
            <a href="contact.html">Contact</a>
        </div> -->
        <div class="button">
            <a href="inscription.php" class="signup-button">S'inscrire</a>
            <a href="connection.php" class="login-button">Se connecter</a>
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

        </style>
    </head>
    <body>
    
        <main>
            <section class="page">
                <div class="content-left">
                    <h1 class="intro-title-primary"></h1>
                    <h2 class="intro-title-text">Bienvenue sur le site Sense7</h2>
                    <p class="text-presentation">Nous vous accompagnons dans vos projets</p>
                    <div class="buttons-container">
                        <a href="inscription.php" class="signup-button">S'inscrire</a>
                        <a href="connection.php" class="login-button">Se connecter</a>
                    </div>
                </div>
                <div class="image-right">
                    <img src="logo.png" alt="Votre image">
                </div>
            </section>
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
    
