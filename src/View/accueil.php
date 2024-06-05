<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <link href="css/style.min.css" rel="stylesheet" />
    <link href="css/styles_bootstrap.css" rel="stylesheet" />
    <script src="js/all.js" crossorigin="anonymous"></script>
    <div class="top-band"></div>
    <nav class="nav">
        <div class="logo">
            <a href="#">
                <img src="logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-links">
            <a href="services.html">Services</a>
            <a href="faq.html">FAQ</a>
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
    <div class="card mb-4 mt-4 me-lg-4" style="margin-left:20px">
    <div class="card-body text-center">
        <?php
        echo "<h1>Bienvenue " . $_SESSION["user"]["username"] . "</h1>";
        ?>
    </div>
</div>

        <div class="sections">
            <!-- <div class="section">
                <img src="image1.png" alt="Image 1">
                <div class="section-text">
                    <h3>Capteur 1</h3>
                    <p>Capteur de son.</p>
                </div>
            </div> -->

 <div class="row">
 <div class="col-xl-5" style="margin-left :160px">
    
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Capteur 1
                </div>
                <div class="card-body" ><img src="image1.png" alt="Image 1" height="300"></div>
            </div>
</div>
<div class="col-xl-5" >

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-chart-area me-1"></i>
        Capteur 2
    </div>
    <div class="card-body d-flex justify-content-center">
        <img src="image2.png" alt="Image 2" height="300">
    </div>
</div>

</div>
<div class="col-xl-5" style="margin-left :160px">

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Capteur 3
                </div>
                <div class="card-body"><img src="image3.png" alt="Image 3" height="300"></div>
            </div>
</div>
<div class="col-xl-5">

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Capteur 4
                </div>
                <div class="card-body"><img src="image1.png" alt="Image 4" height="300"></div>
            </div>
            </div>
</div>

           <!--  <div class="section">
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
            </div> -->
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var elements = document.querySelectorAll("p, a, h1, h2");

            elements.forEach(function (element) {
                element.addEventListener("mouseover", function () {
                    speakText(this);
                });
            });

            function speakText(element) {
                var textToSpeak = element.innerText;
                var utterance = new SpeechSynthesisUtterance(textToSpeak);
                window.speechSynthesis.speak(utterance);
            }

            if (window.history.replaceState) {
                var url = new URL(window.location.href);
                if (url.searchParams.has('true')) {
                    url.searchParams.delete('true');
                    window.history.replaceState(null, '', url.href);
                }
            }
        });
    </script>

    
</body>

</html>