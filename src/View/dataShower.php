<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inscription</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="style.css">
    <link href="css/style.min.css" rel="stylesheet" />
    <link href="css/styles_bootstrap.css" rel="stylesheet" />
    <script src="js/all.js" crossorigin="anonymous"></script>
</head>

<body>
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
    
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-2">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <h3><i class="fas fa-table me-1"></i>Les informations de la Tiva</h3>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatablesSimple" width="100%"
                                cellspacing="0" data-search="true">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">trame</th>
                                        <th scope="col">objet</th>
                                        <th scope="col">requête</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">numéro Capteur</th>
                                        <th scope="col">Valeur</th>
                                        <th scope="col">ans</th>
                                        <th scope="col">checksum</th>
                                        <th scope="col">year</th>
                                        <th scope="col">month</th>
                                        <th scope="col">day</th>
                                        <th scope="col">hour</th>
                                        <th scope="col">min</th>
                                        <th scope="col">sec</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $value = 0; 
                                        $ch = curl_init();
                                        curl_setopt(
                                            $ch,
                                            CURLOPT_URL,
                                            "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G07A");
                                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                        $data = curl_exec($ch);
                                        curl_close($ch);

                                        $data_tab = str_split($data, 33);
                                    
                                        $current_date = date('YmdHis');


                                    for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
                                        $trame = $data_tab[$i];
                                        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
                                        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

                                        echo "<tr>";
                                        echo "<td>" . $t . "</td>";
                                        echo "<td>" . $o . "</td>";
                                        echo "<td>" . $r . "</td>";
                                        echo "<td>" . $c . "</td>";
                                        echo "<td>" . $n . "</td>";
                                        echo "<td>" . $v . "</td>";
                                        echo "<td>" . $a . "</td>";
                                        echo "<td>" . $x . "</td>";
                                        echo "<td>" . $year . "</td>";
                                        echo "<td>" . $month . "</td>";
                                        echo "<td>" . $day . "</td>";
                                        echo "<td>" . $hour . "</td>";
                                        echo "<td>" . $min . "</td>";
                                        echo "<td>" . $sec . "</td>";

                                        echo "</tr>";                                    }
                                    
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                                </main>
                                </div>

            <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="js/datatables-simple-demo.js"></script>
            <script src="js/simple-datatables.min.js" crossorigin="anonymous"></script>

</body>

</html>