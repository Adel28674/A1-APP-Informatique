<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
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
                <a href="forgotPassword.php">
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
        <h1 class="title-primary">Mot de passe oublié</h1> <br>
        <form action="../Model/changePassword.php" method="post">
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required><br>
            
            <button type="submit" class="login-button">Recevoir un mail</button> <br>
            <button type="button" class="login-button" onclick="redirectToConnection()">Retour</button>           

        </form>
    </main>
    
    <?php if (isset($_GET['true'])) : ?>
            <div id="error-message" class="popup">
                Un mail vous a été envoyer pour réinitialiser votre mot de passe
                <button onclick="hideErrorMessage()">OK</button>
            </div>
        <?php endif; ?>
    <script>
        function redirectToConnection() {
            window.location.href = "connection.php";
        }

        function hideErrorMessage() {
            document.getElementById("error-message").style.display = "none";
        }
    </script>
</body>
</html>
