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

        .signup-button, .login-button {
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
<nav class="nav">
        <div class="logo">
            <a href="#">
                <img src="logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-links">
            <a href="services.html">Services</a>
            <a href="faq.html">FAQ</a>
            <a href="contact.html">Contact</a>
            <a href="topics.php">Forum</a>
            <?php
                if($_SESSION["user"]["status"] === 1){
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
        <strong><?= htmlspecialchars($topic['titre']) ?></strong><i class="fa fa-angle-right"></i><span class="header-dropdown-trigger">Activity Title</span>
      </h2>
    </header>
    <div class="response">
      <div class="response__number">1</div>
      <h1 class="response__title">
        <?= htmlspecialchars($topic['titre']) ?>
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
        <textarea name="contenu" required></textarea>
        <button type="submit">Envoyer</button>
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
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem has been the industry's standard  text ever since the 1500s, when type specimen book.</p>
            </div>
            <div class="col">
                <h3>Bureau <div class="underline"><span></span></div></h3>
                <p>Campus Notre-Dame-de-Lorette (NDL)</p>
                <br>
                <p>10, rue de Vanves, 92130 Issy-les-Moulineaux</p>
                <p class="email-id">g7e@isep.com</p>
                <h4>+333333333333</h4>
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
