<?php
session_start();
?>
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
            display: flex;
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
            width: 100%;
            max-width: 600px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 20px;
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

        .createTop {
            margin-top: 20px;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-sizing: border-box;

        }

        .createTop h1 {
            text-align: center;
            margin-bottom: 20px;
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
        <div class="createTop">
            <br>
            <h1>Créer un Topic</h1>
            <form action="../Controller/createTopicController.php" method="post">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre">
                <label for="contenu">Faites une description de votre Topic :</label>
                <textarea id="contenu" name="contenu"></textarea>
                <input type="submit" id="submit" class="login-button" value="Créer un nouveau topic">
            </form>
        </div>
    </main>
</body>

</html>
