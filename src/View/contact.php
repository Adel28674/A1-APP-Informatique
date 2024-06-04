<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page de contact</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
        <link rel="stylesheet" href="style.css">
        <style>
             /* CSS pour le formulaire */
form {
    margin-top: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
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
                <img src="logo.png" alt="Logo" style="width: 50px;">
               </a>
           </div>
           <div class="nav-links">
               <a href="accueil.php" onmouseover="speakText(this)">Accueil</a>
               <a href="services.html" onmouseover="speakText(this)">Services</a>
               <a href="faq.html" onmouseover="speakText(this)">FAQ</a>
           </div>
           <div class="button">
               <a href="profile.php" class="signup-button" onmouseover="speakText(this)">Profil</a>
           </div>
       </nav>
   
       <section class="page">
           <h1 class="intro-title-primary"></h1>
           <h2 class="intro-title-text">Bienvenue sur la Page de contact</h2>
           <p class="text-presentation" onmouseover="speakText(this)">quels questions avez vous a nous poser ? </p>
       </section>
   
       <main>
        <form action="../Model/process_contact.php" method="POST">
            <label for="name" onmouseover="speakText(this)">Nom :</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="email" onmouseover="speakText(this)">Email :</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="message" onmouseover="speakText(this)">Message :</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
            
            <input type="submit" value="Envoyer">
        </form>
       </main>
       <?php if (isset($_GET['true'])) : ?>
            <div id="error-message" class="popup">
                La modification a bien été prise en compte<button onclick="hideErrorMessage()">OK</button>
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
