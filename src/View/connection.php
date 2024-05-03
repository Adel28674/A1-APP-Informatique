<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Placez votre CSS ici si nécessaire */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        form label {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        form input[type="email"],
        form input[type="password"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        
        form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Style pour la popup */
        .popup {
            position: fixed;
            top: 90%;
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
    <nav class="nav">
        <div class="logo">
        <a href="index.php">
                <img src="logo.png" alt="Logo" style="width: 50px;">
            </a>
        </div>
        <div class="button">
            <a href="inscription.php" class="signup-button">S'inscrire</a>
        </div>
    </nav>
</head>
<body>
    <main>
        <h1 class="title-primary">Connexion</h1>
        <form action="../Controller/ConnectionController.php" method="post">
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit" class="login-button">Se connecter</button>
            <br>
            <button type="button" class="login-button" onclick="redirectToForgotPassword()">Mot de passe oublié</button>
        </form>
        <?php if (isset($_GET['error'])) : ?>

            <div id="error-message" class="popup">
                Identifiants incorrects. Veuillez réessayer.
                <button onclick="hideErrorMessage()">OK</button>
            </div>
            <?php endif; ?>

            <?php if (isset($_GET['true'])) : ?>

<div id="error-message" class="popup">
Votre compte a bien été créé. Veuillez vous connecter.    <button onclick="hideErrorMessage()">OK</button>
</div>
<?php endif; ?>


        
    </main>
    <script>
        function redirectToForgotPassword() {
            window.location.href = "mdp.html";
        }

        function hideErrorMessage() {
            document.getElementById("error-message").style.display = "none";
        }
    </script>
</body>
</html>
