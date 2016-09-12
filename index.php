<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Accueil</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/prefixfree.min.js"></script>
    </head>
    <body>
        <?php
            require_once('includes/header.php');
        ?>
            <section id="pub">
                <div class="container">
                    <img id="pause" src="img/pause.png" alt="Pause">

                    <div id="texte-gauche" class="clearfix">
                        <p>Vous aimez aider les autres?</p>
                        <img src="img/icn_handshake.png" alt="Poignée de main" id="main">
                    </div>
                    <div id="texte-droite" class="clearfix">
                        <p>Votre communauté vous tient à coeur?</p>
                        <img src="img/icn_coeur.png" alt="Coeur" id="coeur">
                        <img src="img/fleche.png" alt="Flèche" id="fleche">
                    </div>
                </div>
            </section>
            
            <section id="presentation">
                <div class="container">

                    <h2>La cuisine est un art,<br>je suis un artiste !</h2>

                    <p>La Baratte est un organisme à but non lucratif qui a pour mission d’apporter une véritable alternative à certains besoins dans la communauté. Engagée, elle propose, à la grandeur de la Capitale-Nationale, une réponse concrète aux besoins alimentaires et sociaux des personnes démunies.</p>

                    <a href="mission.php">En savoir plus</a>

                </div>
            </section>

            <section id="mets">
                <div class="container">
                    <h2>Plus de 20 mets congelés à moins de 7$</h2>
                    <div class="clearfix">
                        <img src="img/soupe.jpg" alt="Entrée">
                        <img src="img/pate.jpg" alt="Plat principal" class="img-centre">
                        <img src="img/tarte.jpg" alt="Dessert">
                     </div>
                     <a href="mets_congeles.php">Commander</a>
                     <hr>
                </div>
            </section>

            <section id="accueil-comptoirs">
                <div class="container">
                    <h2>6 comptoirs pour mieux vous servir</h2>
                </div>
                <img src="img/map.png" alt="Carte">
                <div class="container">
                    <a href="contact.php">Contactez-nous</a>
                    <hr>
                </div>
            </section>

        <?php
            require_once('includes/footer.php');
        ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/greensock/TweenMax.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/pub.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
