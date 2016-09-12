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
        <title>Faire un don</title>
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
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php
            require_once('includes/header.php');
        ?>

        <div id="don" class="container">
            <h2>Faire un don</h2>
            
            <h3>Télécharger le <a href="Faire-un-don_FORMULAIRE.pdf" target="_blank">formulaire de don</a> !</h3>
            <p>Un reçu d’impôt est émis pour tout don de 20 $ et plus.</p>
            <p>La Baratte est reconnu comme un organisme de charité (NE : 142833755RR0001) par <a href="http://www.revenuquebec.ca/fr/entreprises/" target="_blank">Revenu Québec</a> et <a href="http://www.cra-arc.gc.ca/ebci/haip/srch/advancedsearch-fra.action" target="_blank">Revenu Canada</a>.</p>
            <p>Merci!</p>
        </div>

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
