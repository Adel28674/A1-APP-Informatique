<!DOCTYPE html>
<html lang="fr">
    <?php
include_once "../Controller/profileController.php"; 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .top-band, .nav, .main, .text-container {
            width: 100%;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .nav-links a, .text-container p {
            cursor: pointer;
        }

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
        }

        .logo img, .nav-links a, .button a {
            margin-right: 10px;
        }

        .button a {
            padding: 5px 10px;
            text-decoration: none;
        }

        .signup-button {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .login-button {
            background-color: gray;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    
    <div class="top-band"></div>
    <nav class="nav">
        <div class="logo">
        <a href="accueil.php">
                <img src="logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-links">
            <a href="services.html">Services</a>
            <a href="faq.html">À propos</a>
            <a href="contact.html">Contact</a>
        </div>
        <div class="button">
            <a href="#" class="signup-button">Profil</a>
            <a href="../Model/deconnexion.php" class="login-button">Deconnexion</a>
        </div>
    </nav>

    <main>
        <h1>Informations sur votre profil</h1> <br>
        <p><strong>Nom :</strong> <br><?php echo $user['name']; ?></p><br>
        <p><strong>Prénom :</strong> <br><?php echo $user['firstName']; ?></p><br>
        <p><strong>Adresse e-mail :</strong><br> <?php echo $user['mail']; ?></p><br>
        <button onclick="location.href='modifyPage.php'">Modifier</button>
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
