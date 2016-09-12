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
        <title>Historique</title>
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

        <div id="historique" class="container"> <!-- DÉBUT HISTORIQUE -->
            <h2>Historique</h2>
            <p>C’est en 1998 qu’un supermarché d’alimentation de Ste-Foy a exprimé le désir auprès du CLSC local d’avoir un seul interlocuteur pour la cueillette des surplus d’aliments.</p>
 
            <p>En 1999, La Baratte est constituée en compagnie et devient un Organisme Sans But Lucratif (O.S.B.L.) reconnu comme organisme de charité auprès de Revenu Québec et Revenu Canada (NE:142833755RR0001). Elle crée un centre de transformation alimentaire afin de produire des aliments congelés à partir de ces dons, qui seront par la suite distribués aux personnes vivant des situations financières difficiles.</p>
 
            <p>La situation a bien changé. Au cours des années, Moisson Québec est devenu l’interlocuteur unique auprès des supermarchés d’aliments. De plus, ces derniers ont développé une variété de produits prêts à manger qu’ils transforment eux-mêmes. En conséquence, La Baratte doit désormais s’approvisionner auprès de grossistes, mais elle bénéficie tout de même de dons de Moisson Québec.</p>
 
            <p class="dernier">Au fil du temps, en plus de la production des mets congelés, La Baratte a ajouté à sa mission la formation et la production de repas chauds pour faciliter le maintien à domicile des personnes vivant des situations difficiles.</p>


            <h2>Statistiques</h2>

            <p>Les quelques données statistiques qui suivent permettent de bien mesurer l’ampleur des services désormais rendus à la communauté desservie par La Baratte.</p>


            <h3>La distribution alimentaire</h3>

            <p>En 2014-2015, La Baratte a produit plus de 150 000 portions individuelles de nourriture saine, équilibrée et riche en protéines, rendues accessibles aux familles en situation de pauvreté et répondant ainsi à un besoin essentiel : celui de se nourrir. Ajoutons à ce bilan, plus de 18 000 collations préparées annuellement, uniquement pour la clientèle interne.</p>

            <p>Grâce à la collaboration des organismes membres et aux comptoirs de La Baratte, les produits de la Baratte sont disponibles dans 32 lieux différents. La Baratte rejoint en moyenne plus de 3 000 familles chaque mois par l’intermédiaire de ses organismes membres et de ses comptoirs.</p>


            <h3>La popote, connue sous l’appellation La Belle Visite</h3>

            <p>Le service de La Belle Visite permet à plus de 374 personnes en perte d’autonomie de recevoir quotidiennement des repas chauds et congelés à domicile.</p>


            <h3>Le personnel régulier, les participants à des programmes d’employabilité, les bénévoles</h3>

            <p>Il serait difficile de parler de sécurité alimentaire sans souligner les quelque 36 404 heures de travail rémunéré investies annuellement au niveau du plateau de transformation alimentaire et les quelque 6 814 heures généreusement fournies par les bénévoles de La Baratte</p>


            <h3>Profil général de la clientèle externe</h3>

            <p>Au 31 mars 2015, La Baratte desservait 3 581 membres. De ce total :</p>
 
               <p> 63 % étaient des femmes vivant seules ;</p>
                 
                <p>32 % étaient des hommes vivant seuls ;</p>
                 
                <p>15 % appartenaient à des familles comptant 1 à 6 enfants à charge, et 21 % étaient monoparentales.</p>

            <p>Pour en savoir plus, voir le <a href="rapport_annuel_2013-2014.pdf" target="_blank">rapport annuel 2013-2014</a>.</p>

        </div> <!-- /DÉBUT HISTORIQUE -->

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
