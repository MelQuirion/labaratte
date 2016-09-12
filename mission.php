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
        <title>Mission et objectifs</title>
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

        <div id="mission" class="container"> <!-- DÉBUT MISSION -->
            <h2>Mission et objectifs</h2>

            <h3>Gérer un centre de transformation alimentaire axé sur la production de plats cuisinés</h3>
           
            <ul>
                <li>Produire des repas chauds pour le maintien à domicile des personnes âgées ou en perte d’autonomie en les aidant à conserver leur autonomie le plus longtemps possible</li>
                <li>Produire des repas congelés pour les organismes membres qui achètent des aliments pour venir en aide aux personnes dans le besoin.</li>
            </ul>
            <p>Pendant le parcours du participant, celui-ci bénéficie d’un suivi individuel avec un(e) intervenant(e) attitré(e) à son dossier afin de l’aider à améliorer ses compétences.</p>

            <h3>Offrir une formation et une éducation visant l’autonomie par l’acquisition d’une première expérience de travail.</h3>

            <h3 id="baratte-schema">La Baratte en schéma</h3>
            <img src="img/baratte_schema.jpg" alt="La Baratte en schéma">

        </div> <!-- /MISSION -->

        <?php
            require_once('includes/footer.php');
        ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

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
