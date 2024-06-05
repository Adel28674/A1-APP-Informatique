<?php
require '../Controller/postMessageController.php';
$id_topic = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Conversation - <?= htmlspecialchars($topic['title']) ?></title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style-Forum.css">
    <style>
        .nav {
    left: 0;
    width: 100%;
    padding: 15px 20px;
    background-color:#0d295b;
}
.nav,
.nav .nav-links {
    display: flex;
    align-items: center;
    color : white;
}
.nav .nav-links a:hover {
    text-decoration: underline;
}
.nav {
    justify-content: space-between;
}

a {
    font-size: 14px;
    font-weight: 200;
    /* size: ; */
    text-decoration: none;
    color: var(--text-color);

}

.nav .logo {
    size: 5px;
    color: var(--primary-color);
}

.nav .nav-links {
    font-size: 14px;
    font-weight: 200;
    column-gap: 50px;
    list-style: none;
    color: var(--text-color);
    margin-top: 10px;
}

.nav .nav-links a {
    transition: all 0.2s linear;

}

.nav .nav-link button {

}
.nav .button a:hover {
        text-decoration: underline;
}

.nav .button .signup-button{
    font-size: 16px;
    font-weight: 700;
    background-color: var(--body-color);
    color: var(--primary-color);
    width: 150px;
    height: 38px;
    margin-right: 9px;
    cursor: pointer;
    border:1px solid var(--primary-color);
    display:inline-block;
    text-decoration:none;
}

            
    </style>
</head>
<body>
<nav class="nav">
        <div class="logo">
            <a href="accueil.php">
                <img src="logo.png" alt="Logo" width="100px">
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
<div class="container">
  <div class="response-group">
    <header>
      
      <h2>
        <strong><a style="color: inherit; text-decoration: none;" href="topics.php"><?= htmlspecialchars($topic['titre']) ?></a></strong><i class="fa fa-angle-right"></i><span class="header-dropdown-trigger">Activity Title</span>
      </h2>
    </header>
    <div class="response">
      <div class="response__number">1</div>
      <h1 class="response__title">
      <?= htmlspecialchars($topic['contenu']) ?>

      </h1>
      <div class="post-group">
        <?php foreach ($messages as $post): ?>
        <div class="post">
          <div class="post__avatar"></div>
          <h3 class="post__author">

          <?= htmlspecialchars($post['author']) ?>
          </h3>
          <h4 class="post__timestamp">
            <?= date('M d \a\t h:iA', strtotime($post['date_creation'])) ?>
          </h4>
          <p class="post__body">
            <?= htmlspecialchars($post['contenu']) ?>
          </p>
          <div class="post__actions">
            <div class="button button--approve">
              <i class="fa fa-thumbs-o-up"></i><i class="fa fa-thumbs-up solid"></i>
            </div>
            <div class="button button--deny">
              <i class="fa fa-thumbs-o-down"></i><i class="fa fa-thumbs-down solid"></i>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <form method="post" action="../Controller/postMessageController.php?id=<?= $id_topic ?>">
            <label for="message" style="margin: 20px;">Votre message :</label>
            <textarea id="message" name="contenu" required style="width: 100%; height: 150px; box-sizing: border-box; padding: 10px; margin-bottom: 10px; resize: vertical;"></textarea>
            <button type="submit" class="submit-button" id="sendMessage"><style>#sendMessage {
            padding: 10px 20px;
            margin-left: 20px;
            background-color: #000000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }</style> 
        Envoyer    
    </button>
        </form>
    </div>
  </div>
</div>

<footer>
        <style>
            *{
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
    box-sizing: border-box;
}

body{
    background: #eef8ff;
}

footer{
    width: 100%;
    position: relative;
    bottom: 0;
    background: #0d295b;
    color: #fff;
    padding: 50px 0 20px;
    border-top-left-radius: 50px ;
    font-size: 12px;
    line-height: 18px;
}

.row{
    width: 85%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: space-between;
}

.col{
    flex-basis: 25%;
    padding: 10px;
}

.col:nth-child(2), .col:nth-child(3){
    flex-basis: 15%;
}

.logo{
    width: 60px;
    margin-bottom: 20px;
}

.col h3{
    width: fit-content;
    margin-bottom: 20px;
    position: relative;
}

.email-id{
    width: fit-content;
    border-bottom: 1px solid #ccc;
    margin: 10px 0;
}

ul li {
    list-style: none;
    margin-bottom: 8px;
}

ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 12px;
}

form{
    padding-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #ccc;
    margin-bottom: 30px;
}

form .far{
    font-size: 16px;
    margin-right: 8px;
}

form input{
    width: 70%;
    background: transparent;
    color: #ccc;
    border: 0;
    outline: none;
}

form button{
    background: transparent;
    border: 0;
    outline: none;
    cursor: pointer;
}

form button .fas{
    font-size: 14px;
    color: #ccc;
}

.social-icons .fab{
    width: 30px; /* Reduced icon size */
    height: 30px; /* Reduced icon size */
    border-radius: 50%;
    text-align: center;
    line-height: 30px; /* Reduced line height */
    font-size: 14px; /* Reduced font size */
    color: #000;
    background: #fff;
    margin-right: 10px; /* Reduced margin */
    cursor: pointer;
}

hr{
    width: 90%;
    border: 0;
    border-bottom: 1px solid #ccc;
    margin: 10px auto; /* Reduced margin */
}

.copyright{
    text-align: center;
}

.underline{
    width: 100%;
    height: 5px;
    background: #767676;
    border-radius: 3px;
    position: absolute;
    top: 25px;
    left: 0;
    overflow: hidden;
}

.underline span{
    width: 15px;
    height: 100%;
    background: #fff;
    border-radius: 3px;
    position: absolute;
    top: 0;
    left: 10px;
    animation: moving 2s linear infinite;
}

@keyframes moving{
    0%{
        left: -20px;
    }
    100%{
        left: 100%;
    }
}

@media (max-width: 700px){
    footer{
        bottom: unset;
    }
    .col{
        flex-basis: 100%;
    }
    
    .col:nth-child(2), .col:nth-child(3){
        flex-basis: 15%;
    }
}
        </style>
        <div class="row">
            <div class="col">
                <img src="logo.png" class="logo">
                <p>Sevensense est une entreprise jeune qui met en avant le travail acharné et la détermination. Nous vendons des capteurs sonore vous permettant de faire la fête en faisant attention aux oreilles !</p>
            </div>
            <div class="col">
                <h3>Bureau <div class="underline"><span></span></div></h3>
                <p>Campus Notre-Dame-de-Lorette (NDL)</p>
                <br>
                <p>10, rue de Vanves, 92130 Issy-les-Moulineaux</p>
                <p class="email-id">g7e@isep.com</p>
                <h4>+26525615613</h4>
            </div>
            <div class="col">
                <h3>Liens <div class="underline"><span></span></div></h3>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="Services.html">Services</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>Newsletter <div class="underline"><span></span></div></h3>
                <form>
                    <i class="far fa-envelope"></i>
                    <input type="email" placeholder="Entrer ton mail" required>
                    <button type="submit"><i class="fas fa-arrow-right"></i></button>
                </form>
                <div class="social-icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-whatsapp"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright">SEN7SE © 2024- All Rights Reserved</p>
    </footer>


<script>
        document.addEventListener('DOMContentLoaded', function () {
            var approveButtons = document.querySelectorAll('.button--approve');
            var denyButtons = document.querySelectorAll('.button--deny');

            approveButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    this.classList.toggle('active');
                    // Enlever l'état actif du bouton deny si il est activé
                    var siblingDeny = this.parentNode.querySelector('.button--deny');
                    if (siblingDeny.classList.contains('active')) {
                        siblingDeny.classList.remove('active');
                    }
                });
            });

            denyButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    this.classList.toggle('active');
                    // Enlever l'état actif du bouton approve si il est activé
                    var siblingApprove = this.parentNode.querySelector('.button--approve');
                    if (siblingApprove.classList.contains('active')) {
                        siblingApprove.classList.remove('active');
                    }
                });
            });
        });
    </script>
</body>
</html>
