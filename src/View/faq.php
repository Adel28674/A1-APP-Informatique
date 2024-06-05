<?php
session_start()
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'FAQ</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <div class="top-band">
    </div>
    <nav class="nav">
        <div class="logo">
            <a href="#">
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
            .faq {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .faq-item {
            width: 80%;
            max-width: 600px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .faq-item:hover {
            background-color: #e6e6e6;
        }

        .faq-item h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #0d295b;
        }

        .faq-item p {
            display: none;
            font-size: 16px;
            color: #333;
        }

        .faq-item:hover p {
            display: block;
        }
        </style>
    </head>
    <body>
    
        <main>

                <h1 class="intro-title-primary"></h1>
                <h2 class="intro-title-text" onmouseover="speakText(this)">Bienvenue sur notre FAQ</h2>
                <div class="faq">
                    <div class="faq-item">
                        <h3 onmouseover="speakText(this)">Qu'est ce que Sense7</h3>
                        <p onmouseover="speakText(this)">Sense7 est une jeune entreprise dynamique composé de 5 etudiants de l'ISEP composant la fine fleur de l'ingenierie française </p>
                    </div>
                    <div class="faq-item">
                        <h3 onmouseover="speakText(this)">Quelles sont les principales fonctionnalités du capteur Sense7?</h3>
                        <p onmouseover="speakText(this)">Le capteur Sense7 est conçu pour détecter divers types de sons tels que la musique, les conversations et les bruits ambiants. Il mesure également la température pour fournir une analyse complète de l'ambiance d'une salle.</p>
                    </div>
                    <div class="faq-item">
                        <h3 onmouseover="speakText(this)">Comment contacter le support Sense7 en cas de besoin?</h3>
                        <p onmouseover="speakText(this)">Les utilisateurs peuvent contacter le support Sense7 via la page "Contact" du site, où ils pourront poser leurs questions par message. Le support s'engage à être aussi disponible que possible.</p>
                    </div>
                    <div class="faq-item">
                        <h3 onmouseover="speakText(this)">Quels types d'utilisateurs peuvent accéder au site web de Sense7?</h3>
                        <p onmouseover="speakText(this)">Le site web de Sense7 est accessible à trois types d'utilisateurs : les utilisateurs standard, les gestionnaires et les administrateurs, chacun ayant des niveaux d'accès et des fonctionnalités spécifiques.</p>
                    </div>
                    <div class="faq-item">
                        <h3 onmouseover="speakText(this)">Comment un utilisateur peut-il créer un compte sur le site de Sense7?</h3>
                        <p onmouseover="speakText(this)">Un utilisateur peut créer un compte en accédant à la page d'inscription du site de Sense7, où il devra fournir les informations nécessaires et suivre les instructions pour compléter l'enregistrement.</p>
                    </div>
                </div>





        
        </main>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var elements = document.querySelectorAll("p, a, h2"); // Sélectionne tous les éléments <p>, <h2> et <a> de la page
        
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
    




<!-- 

    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Quelles sont les principales fonctionnalités du capteur Sense7?</h3>
        <p onmouseover="speakText(this)">Le capteur Sense7 est conçu pour détecter divers types de sons tels que la musique, les conversations et les bruits ambiants. Il mesure également la température pour fournir une analyse complète de l'ambiance d'une salle.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Comment fonctionne la plateforme web de Sense7?</h3>
        <p onmouseover="speakText(this)">La plateforme web intuitive de Sense7 permet d'accéder en temps réel aux données capturées par le capteur, facilitant leur gestion et analyse. Les utilisateurs peuvent visualiser des statistiques, configurer des alertes et générer des rapports personnalisés.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Quels types d'utilisateurs peuvent accéder au site web de Sense7?</h3>
        <p onmouseover="speakText(this)">Le site web de Sense7 est accessible à trois types d'utilisateurs : les utilisateurs standard, les gestionnaires et les administrateurs, chacun ayant des niveaux d'accès et des fonctionnalités spécifiques.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Comment un utilisateur peut-il créer un compte sur le site de Sense7?</h3>
        <p onmouseover="speakText(this)">Un utilisateur peut créer un compte en accédant à la page d'inscription du site de Sense7, où il devra fournir les informations nécessaires et suivre les instructions pour compléter l'enregistrement.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Quelles données sont visualisables par les utilisateurs sur le site?</h3>
        <p onmouseover="speakText(this)">Les utilisateurs peuvent visualiser des données en temps réel provenant des capteurs, telles que les niveaux sonores et la température. Ils peuvent également analyser ces données à l'aide de modules de statistiques pour adapter les environnements sonores.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Quelles options de personnalisation offre le site web de Sense7?</h3>
        <p onmouseover="speakText(this)">Le site web de Sense7 offre des fonctionnalités personnalisables telles que les alertes et les rapports. Les utilisateurs peuvent également éditer les informations de leur profil et changer la langue du site.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Comment contacter le support Sense7 en cas de besoin?</h3>
        <p onmouseover="speakText(this)">Les utilisateurs peuvent contacter le support Sense7 via la page "Contact" du site, où ils trouveront un numéro de téléphone et une adresse email pour obtenir de l'aide. Le support s'engage à être aussi disponible que possible.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Comment les gestionnaires peuvent-ils gérer les utilisateurs de leur groupe?</h3>
        <p onmouseover="speakText(this)">Les gestionnaires ont accès à une page de gestion des utilisateurs où ils peuvent consulter et supprimer des utilisateurs de leur groupe, ainsi que gérer leurs informations, à l'exception des mots de passe.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Quelles sont les responsabilités des administrateurs sur le site Sense7?</h3>
        <p onmouseover="speakText(this)">Les administrateurs peuvent accéder à des fonctionnalités de back office telles que la gestion de la FAQ, des CGU et des mentions légales, du forum, des utilisateurs et des logs de connexion.</p>
    </div>
    <div class="faq-item">
        <h3 onmouseover="speakText(this)">Quelles mesures d'accessibilité sont mises en place sur le site de Sense7?</h3>
        <p onmouseover="speakText(this)">Le site de Sense7 est conçu avec une charte graphique épurée et simple pour faciliter la navigation, notamment pour les utilisateurs ayant des handicaps. Des paramètres d'accessibilité comme la taille de la police et des couleurs adaptées sont également disponibles.</p>
    </div> -->