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
        <title>Contact</title>
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

        <div id="contact" class="container"> <!-- DÉBUT CONTACT -->
            <h2>Contactez-nous à l’un de nos comptoirs</h2>
            <p>Les comptoirs de La Baratte situés dans différents secteurs de la Ville de Québec permettent à la clientèle démunies de se procurer ses repas congelés. Les horaires et les conditions d’accès au service sont définis par l’organisme gérant.</p>
            <p>Toujours dans un souci d’être le plus accessible au public et aux bénéficiaires de ses services. La Baratte se développe et prend racine dans différents secteurs de la Capitale-Nationale. Ainsi, nos plats cuisinés congelés sont accessibles dans l’un des comptoirs suivants :</p>
        
            <div id="map"></div>

            <div class="row clearfix">
                <div class="comptoir">
                    <h4>Café de La Baratte</h4>
                    <p>2120, rue Boivin, Québec<br>
                    Lundi au vendredi : 8h à 15h</p>    
                </div>

                <div class="comptoir">
                    <h4>Comptoir Claude-Allard</h4>
                    <p>3200, avenue d’Amours, Québec<br>
                    Jeudi : 14h30 à 18h30</p>    
                </div>

                <div class="comptoir">
                    <h4>Comptoir Montcalm</h4>
                    <p>265, boul. René-Lévesque, Québec<br>
                    Mercredi : 16h à 18h<br>
                    Samedi : 9h30 à 11h</p>    
                </div>
            </div>

             <div class="row clearfix last">
                <div class="comptoir">
                    <h4>Comptoir Croissance</h4>
                    <p>215, rue Caron, Québec<br>
                    Mercredi : 9h30 à 13h<br>
                    Dans les locaux de Croissance Travail</p>    
                </div>

                <div class="comptoir">
                    <h4>Comptoir Basse Ville</h4>
                    <p>301, rue de Carillon, Québec<br>
                    Jeudi : 9h30 à 12h<br>
                    Dans les locaux de l’Association pour la Défense des Droits Sociaux du Québec Métropolitain (A.D.D.S.Q.M.)</p>    
                </div>

                <div class="comptoir">
                    <h4>Comptoir L'Accorderie</h4>
                    <p>151A, rue Saint-François Est, Québec<br>
                    Mercredi : 9h à 19h<br>
                    Samedi : 10h à 13h<br>
                    Dans les locaux de l’Accorderie</p>    
                </div>
            </div>

            <p>Pour les personnes qui souhaitent encourager notre organisme en profitant de nos nombreux plats, le droit d’adhésion, ainsi que le prix d’achat sont légèrement plus élevés.</p>

            <p>Enfin, il existe plus de <a href="#">34 organismes membres</a> qui offrent nos produits. L’accès aux produits de La Baratte est à vérifier selon leurs propres critères d’admissibilité.</p>
        </div> <!-- /CONTACT -->


        <?php
            require_once('includes/footer.php');
        ?>


        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="js/map.js"></script>

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
