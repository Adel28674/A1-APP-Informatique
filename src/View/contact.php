<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page de contact</title>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
        <link rel="stylesheet" href="style.css">
        <style>
            form {
                margin-top: 50px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            form input[type="text"],
        form input[type="email"],
        form input[type="message"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
            label {
                font-size: 18px;
                color: #0d295b;
                margin-bottom: 10px;
            }

            input[type="text"],
            input[type="email"],
            textarea {
                width: 100%;
                padding: 12px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                transition: border-color 0.3s ease;
            }

            input[type="text"]:focus,
            input[type="email"]:focus,
            textarea:focus {
                border-color: #0d295b;
            }

            textarea {
                height: 150px;
            }

            input[type="submit"] {
                width: 150px;
                padding: 12px;
                border: none;
                border-radius: 5px;
                background-color: #0d295b;
                color: white;
                font-size: 18px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #0f00ba;
            }

            .popup {
                position: fixed;
                top: 92%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: white;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                z-index: 9999;
            }
        </style>
    </head>

<body>
    <nav class="nav">
        <div class="logo">
            <a href="accueil.php">
                <img src="logo.png" alt="Logo">
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

    <section class="page">
        <h1 class="intro-title-primary"></h1>
        <h2 class="intro-title-text">Bienvenue sur la Page de contact</h2>
        <p class="text-presentation" onmouseover="speakText(this)" style="margin-bottom:-30px">Quels questions avez vous a nous poser ? </p>
    </section>
    <main>
        <form action="../Model/process_contact.php" method="POST">
            <label for="name" onmouseover="speakText(this)">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email" onmouseover="speakText(this)">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message" onmouseover="speakText(this)">Message :</label>
<textarea id="message" name="message" required style="width: 50%;"></textarea>


            <input type="submit" value="Envoyer">
        </form>
    </main>
    <?php if (isset($_GET['true'])): ?>
        <div id="error-message" class="popup">

            Nous avons bien reçu votre demande, elle sera traitée dans un délai de 24 h.<button
                onclick="hideErrorMessage()">OK</button>
        </div>
    <?php endif; ?>
    <script>
        function speakText(element) {
            var textToSpeak = element.innerText;
            var utterance = new SpeechSynthesisUtterance(textToSpeak);
            window.speechSynthesis.speak(utterance);
        }

        function hideErrorMessage() {
            document.getElementById("error-message").style.display = "none";
        }
    </script>
</body>

</html>

</html>