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
                cursor: pointer; 
            }
    
            .nav-links a {
                cursor: pointer;
            }
            .page {
    display: flex;
    justify-content: space-between; 
    align-items: center; 
    }

    .content-left {
    flex: 1; 
    display: flex;
    flex-direction: column;
    justify-content: center; 
    align-items: center; 
    padding-right: 20px; 
}


    .image-right {
    flex: 1; 
    display: flex;
    justify-content: center; 
    align-items: center; 
}

.centered-image {
    max-width: 100%; 
}



    .buttons-container {
    display: flex;
    justify-content: center; 
    margin-top: 20px; 

}

.signup-button,
.login-button {
    padding: 10px 20px;
    margin-right: 10px; 
    background-color: #000000;
    color: #fff; 
    text-decoration: none; 
    border-radius: 5px; 
}

.login-button {
    background-color: #000000; 
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
            var elements = document.querySelectorAll("p, a, h1, h2");
    
            elements.forEach(function(element) {
                element.addEventListener("mouseover", function() { 
                    speakText(this); 
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
    
