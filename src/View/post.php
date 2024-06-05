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
