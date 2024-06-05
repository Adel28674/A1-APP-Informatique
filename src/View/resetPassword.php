<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier votre profil</title>
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

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            width: 300px;
            margin-left: 600px
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkblue;
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
    <div class="top-band"></div>
    <nav class="nav">
        <div class="logo">
            <a href="accueil.php">
                <img src="logo.png" alt="Logo">
            </a>
        </div>
        <div class="button">
            <a href="connection.php" class="signup-button">Se connecter</a>
        </div>
       
    </nav>
    <main>
        <br>
        <h1>Modifier votre mot de passe</h1>
        <form action="../Controller/modifyPassword.php" method="post">
        <label for="mail">Adresse e-mail :</label>
            <input type="mail" id="mail" name="mail" value="<?php echo isset($user['mail']) ? $user['mail'] : ''; ?>">
            <label for="password">Nouveau mot de passe :</label>
            <input type="password" id="password" name="password" value="<?php echo isset($user['password']) ? $user['password'] : ''; ?>">
            <!-- <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" value=""><br> -->
            <button type="submit" class="login-button">Enregistrer</button>
        </form>

        <?php if (isset($_GET['true'])) : ?>
            <div id="error-message" class="popup">
                La modification a bien été prise en compte<button onclick="hideErrorMessage()">OK</button>
            </div>
        <?php endif; ?>
    </main>
    <script>
        function hideErrorMessage() {
            document.getElementById("error-message").style.display = "none";
        }

        (function() {
            if (window.history.replaceState) {
                var url = new URL(window.location.href);
                if (url.searchParams.has('true')) {
                    url.searchParams.delete('true');
                    window.history.replaceState(null, '', url.href);
                }
            }
        })();
    </script>
</body>

</html>
