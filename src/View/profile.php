<!DOCTYPE html>
<html lang="fr">
<?php
include_once "../Controller/profileController.php"; 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            text-align: center;
            color: #333;
        }

        .top-band {
            width: 100%;
            background-color: #007bff;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
          margin-top: -312px;

      
 }

        .nav-links a {
            margin-right: 15px;
            text-decoration: none;
            color: white;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #0056b3;
        }

        .button a {
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-weight: 500;
            margin-right: 10px;
        }

        .signup-button {
            background-color: #28a745;
        }

        .login-button {
            background-color: #6c757d;
        }

        main {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
            height: 500px;
        }

        main h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        main img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        main p {
            font-size: 18px;
            line-height: 1.6;
            margin: 5px 0;
        }

        main button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        main button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="top-band"></div>
    <nav class="nav">
        <div class="logo">
            <a href="accueil.php">
                <img src="logo.png" alt="Logo" width="50">
            </a>
        </div>
        <div class="nav-links">
            <a href="services.html">Services</a>
            <a href="faq.html">À propos</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="button">
            <!-- <a href="inscription.html" class="signup-button">S'inscrire</a>
            <a href="connexion.html" class="login-button">Se connecter</a> -->
        </div>
    </nav>
  
    <main>
        <h1>Informations sur votre profil</h1> 
        <img src="logo.png" alt="Photo de profil">
        <p><strong>Nom :</strong> <?php echo $user['name']; ?></p>
        <p><strong>Prénom :</strong> <?php echo $user['firstName']; ?></p>
        <p><strong>Adresse e-mail :</strong> <?php echo $user['mail']; ?></p>
        <button onclick="location.href='modifyPage.php'">Modifier</button>
        <button onclick="location.href='forgotPassword.php'">Modifier Votre Mot de Passe</button>
    </main>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll("p, a");
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
