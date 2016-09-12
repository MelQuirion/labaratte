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
        <title>Commander</title>
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
    <body class="cache">

        <?php
            require_once('includes/header.php');
        ?>

        <div id="mets-congeles" class="container"> <!-- DÉBUT METS-CONGELES -->
            <h2>Mets congelés</h2>

            <!-- AFFICHAGE MESSAGE -->
            <p class="message animated bounceIn">
                <?php
                    if (isset($_GET['mess']))
                    { 
                        if($_GET['mess'] == "Ajout")
                        {
                            echo 'Mets ajouté au <a href="panier.php">panier.</a>';
                        }
                        else if (($_GET['mess'] == "Connexion") && (!isset($_SESSION['courriel'])))
                        {
                            echo 'Veuillez vous <a href="#" id="lienConnexion">connectez</a> ou vous <a href="inscription.php">inscrire</a> pour ajouter au panier';
                        } 
                    } 
                ?>
            </p>
            <!-- /AFFICHAGE MESSAGE -->

            <!-- ENTRÉES -->
            <h3>Entrées</h3>
             <?php

                try {
                        $cpt = 0;
                        $req = $bdd->prepare('SELECT * FROM mets WHERE type="entree"'); //va chercher les entrées
                        $req->execute();

                        while ($donnees = $req->fetch())
                        {
                            if(($cpt)%4 == 0) //début d'une ligne
                            {
                                echo '<div class="row clearfix">';
                            }
                            $cpt++;

                            //affichage info mets

                            //DEBUT METS
                            echo '<div class="mets"><div class="info-mets" style="background-image: url(img/mets/'.$donnees['img'].'); background-size: cover;"><h4>'. $donnees['nom'] . '</h4><p>'. $donnees['format'] . '</p><p>'. $donnees['prix'] . ' $</p></div>';
                            ?>
                                <form method="get" action="ajouterPanier.php">
                                    <button class="btnMoins">-</button>
                                    <input type="text" name="txtQte" class="txtQte" value="0" readonly>
                                    <button class="btnPlus">+</button>
                                    <input type="submit" value="Ajouter au panier">
                                    <input type="hidden" name="idMets" value="<?php echo $donnees['id']; ?>">
                                </form>
                            </div> <!-- FIN METS -->
                            <?php

                            if ($cpt%4 == 0) //fin d'une ligne
                            {
                                echo '</div>';
                            }
                        }
                        $req->closeCursor();
                    } catch (PDOException $e) {
                        exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = SELECT");
                    }

                if ($cpt%4!=0) //on ferme la div .row si elle n'a pas été fermé avant 
                {
                    echo '</div>';
                }
            ?>
            <!-- /ENTRÉES -->

            <!-- PLATS PRINCIPAUX -->
            <h3>Plats principaux</h3>

            <?php

                try {
                        $cpt = 0;
                        $req = $bdd->prepare('SELECT * FROM mets WHERE type="principal"'); //va chercher les plats principaux
                        $req->execute();

                        while ($donnees = $req->fetch())
                        {
                            if(($cpt)%4 == 0) //début d'une ligne
                            {
                                echo '<div class="row clearfix">';
                            }

                            $cpt++;

                            //affichage info mets

                            //DEBUT METS
                            echo '<div class="mets"><div class="info-mets" style="background-image: url(img/mets/'.$donnees['img'].'); background-size: cover;"><h4>'. $donnees['nom'] . '</h4><p>'. $donnees['format'] . '</p><p>'. $donnees['prix'] . ' $</p></div>';
                            ?>
                                <form method="get" action="ajouterPanier.php">
                                    <button class="btnMoins">-</button>
                                    <input type="text" name="txtQte" class="txtQte" value="0" readonly>
                                    <button class="btnPlus">+</button>
                                    <input type="submit" value="Ajouter au panier">
                                    <input type="hidden" name="idMets" value="<?php echo $donnees['id']; ?>">
                                </form>
                            </div> <!-- FIN METS -->
                            <?php

                            if ($cpt%4 == 0) //fin d'une ligne
                            {
                                echo '</div>';
                            }
                        }
                        $req->closeCursor();
                    } catch (PDOException $e) {
                        exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = SELECT");
                    }

                if ($cpt%4!=0) //on ferme la div .row si elle n'a pas été fermé avant 
                {
                    echo '</div>';
                }
            ?>
            <!-- /PLATS PRINCIPAUX -->

            <!-- DESSERTS -->
            <h3>Desserts</h3>

            <?php
                try {
                        $cpt = 0;
                        $req = $bdd->prepare('SELECT * FROM mets WHERE type="dessert"'); //va chercher les desserts
                        $req->execute();

                        while ($donnees = $req->fetch())
                        {
                            if(($cpt)%4 == 0) //début d'une ligne
                            {
                                echo '<div class="row clearfix">';
                            }

                            $cpt++;

                            //affichage info mets

                            //DEBUT METS
                            echo '<div class="mets"><div class="info-mets" style="background-image: url(img/mets/'.$donnees['img'].'); background-size: cover;"><h4>'. $donnees['nom'] . '</h4><p>'. $donnees['format'] . '</p><p>'. $donnees['prix'] . ' $</p></div>';
                            ?>
                                <form method="get" action="ajouterPanier.php">
                                    <button class="btnMoins">-</button>
                                    <input type="text" name="txtQte" class="txtQte" value="0" readonly>
                                    <button class="btnPlus">+</button>
                                    <input type="submit" value="Ajouter au panier">
                                    <input type="hidden" name="idMets" value="<?php echo $donnees['id']; ?>">
                                </form>
                            </div> <!-- FIN METS -->
                            <?php

                            if ($cpt%4 == 0) //fin d'une ligne
                            {
                                echo '</div>';
                            }
                        }
                        $req->closeCursor();
                    } catch (PDOException $e) {
                        exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = SELECT");
                    }

                if ($cpt%4!=0) //on ferme la div .row si elle n'a pas été fermé avant 
                {
                    echo '</div>';
                }
            ?>
            <!-- /DESSERTS -->

            <a class="bouton" href="panier.php">Voir le panier</a>
        </div> <!-- /METS-CONGELES -->

        <?php
            require_once('includes/footer.php');
        ?>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/mets_congeles.js"></script>


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
