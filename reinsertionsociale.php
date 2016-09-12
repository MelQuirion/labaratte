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
        <title>Programmes de réinsertion sociale</title>
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

        <div id="reinsertion" class="container"> <!-- DÉBUT REINSERTION -->
            <h2>Programmes de réinsertion sociale</h2>

            <h3>Trampoline</h3>
            <p>Trampoline est un programme d’employabilité financé par Emploi Québec d’une durée de 18 à 30 semaines, offert aux personnes âgées de 18 à 65 ans, désirant s’orienter vers un métier semi-spécialisé tel qu’aide cuisinier, commis à l’entrepôt ou commis en service à la clientèle. Associé à la Commission scolaire de la Capitale, le programme dispense des ateliers hebdomadaires visant le développement des compétences personnelles, citoyennes, techniques et professionnelles. Un stage de 4 semaines en entreprise privée favorise le passage vers un emploi stable.</p>
            <ul>
                <li>Aide cuisinier(e)</li>
                <li>Commis d’entrepôt</li>
                <li>Commis caissier(e)</li>
            </ul>
            <p>Pendant le parcours du participant, celui-ci bénéficie d’un suivi individuel avec un(e) intervenant(e) attitré(e) à son dossier afin de l’aider à améliorer ses compétences.</p>

            <h3>PAAS Action</h3>
            <p>Ce programme s’adresse à des personnes voulant quitter la Sécurité du revenu et présentant diverses problématiques sociales : dépendance intergénérationnelle, faible scolarisation, situation personnelle ou professionnelle difficile, perte de motivation, problèmes de santé mentale ou physique. Ce programme est financé par le ministère de l’Emploi et de la Solidarité sociale. Il permet à ses participants de :</p>
            <ul>
                <li>Vivre des expériences valorisantes</li>
                <li>S’intégrer socialement</li>
                <li>Faire part de leurs difficultés</li>
                <li>Regagner l’espoir</li>
                <li>Augmenter la confiance en soi</li>
                <li>Contribuer à la société selon ses capacités et ses champs d’intérêt</li>
            </ul>

            <h3>TANDEM (actuellement indisponible)</h3>
            <p>Tandem est un programme d’employabilité financé par Service Canada, offert aux personnes âgées de 16 à 30 ans, désirant expérimenter le monde du travail. Les participants reçoivent une formation de 15 semaines à La Baratte suivie d’un stage en entreprise privée de 12 semaines. Ce stage permet aux participants de faire le pont entre le programme d’insertion en emploi et la réalité du marché du travail.</p>
            <p>En lien avec les missions de l’organisme, nous offrons le programme Tandem qui est dispensé dans le cadre des programmes «Connexion compétences» de la DRHDC (Ressources humaines et Développement des compétences Canada).</p>
            <p>Ce programme, d’une durée totale de 27 semaines, se scinde en deux étapes :</p>
            <ul>
                <li>Les 15 premières semaines se déroulent sur les différents plateaux de travail que propose La Baratte (cuisine, plonge, laverie, entrepôt et livraison de repas chauds à domicile)</li>
                <li>Les 12 dernières semaines consistent en un stage dans une entreprise au choix du participant</li>
            </ul>

            <p>L’intervenant socioprofessionnel de La Baratte assure un suivi complet tout au long de ce stage par le biais de visites et d’ateliers hebdomadaires.</p>
            <p>Grâce à notre expertise en termes d’intégration socioprofessionnelle, nous offrons le soutien nécessaire dans l’accompagnement des jeunes et de leur tuteur dans cette aventure professionnelle.</p>
        </div> <!-- /REINSERTION -->

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
