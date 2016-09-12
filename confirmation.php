<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    include('includes/connexion.php');

    if (!isset($_SESSION['courriel'])) //si l'utilisateur n'est pas connecté
    {
        header("Location:index.php");
        exit();
    }

    if (isset($_GET['adresse']) && isset($_GET['ville']) && isset($_GET['cp'])) //si l'utilisateur a rempli les champs
    {           
        $adresse = $_GET['adresse'];
        $app = $_GET['app'];
        $ville = $_GET['ville'];
        $cp = $_GET['cp'];

    }
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sommaire de la commande</title>
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

        <div id="confirmation" class="container clearfix"> <!-- DÉBUT CONFIRMATION -->
            <h2>Votre commande a été effectué avec succès</h2>

                <h3>Adresse de livraison</h3>
                <p><?php echo $adresse.','.$app.'<br>'.$ville.'<br>'.$cp; ?></p>

                <h3>Contenu de la commande</h3>
                <ul class="clearfix">
                    <li>Mets</li>
                    <li>Prix</li>
                    <li>Quantité</li>
                    <li>Sous-total</li>
                </ul>

            <!-- AFFICHAGE INFOS COMMANDE -->
            <?php
                if (isset($_SESSION['tabId']))
                {
                    $total = 0;
                    $nbContenant = 0;

                    for($i=0; $i<sizeof($_SESSION['tabId']); $i++) //parcourt le tableau id mets
                    {
                        $sTotal = 0;
                        $idMets = $_SESSION['tabId'][$i];
                        $qte = $_SESSION['tabQte'][$i];
                        try {
                            $req = $bdd->prepare("SELECT * FROM mets WHERE id=:id"); //va chercher les infos sur les mets faisant partis de la commande
                            $req->execute(array('id' => $idMets));

                            if ($donnees = $req->fetch())
                            {
                                $sTotal = $donnees['prix']*$qte;
                                $sTotal = number_format($sTotal, 2, '.', ' ');
                                $nbContenant += $qte;
                                $total = $total + $donnees['prix']*$qte;
                                $total = number_format($total, 2, '.', ' ');
                                
                                ?>
                                <div class="item clearfix">
                                    <p><?php echo $donnees['nom'] ?></p>
                                    <p class="prix"><?php echo $donnees['prix'] . ' $' ?></p>
                                    <p><?php echo $qte ?></p>
                                    <p><?php echo $sTotal . ' $' ?></p>
                                </div>
                                <?php
                            }

                        } catch (PDOException $e) {
                            exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = SELECT");
                        }
                        $req->closeCursor();
                    }   
                }

                unset($_SESSION['tabId']);  //vide le panier
                unset($_SESSION['tabQte']); //vide le panier
            ?>
            <!-- /AFFICHAGE INFOS COMMANDE -->

            <!-- AFFICHAGE TOTAL -->
            <hr>
            <div class="total clearfix">
                <div class="clearfix">
                    <p>Total <span>(<?php echo $nbContenant; if($nbContenant<=1){ echo ' contenant';} else{ echo ' contenants';} ?>)</span> :</p>
                    <p><?php echo $total . ' $' ?></p>
                </div>

                <div class="clearfix">
                    <a href="index.php">Retour à l'accueil</a>
                </div>

            </div>
            <!-- /AFFICHAGE TOTAL -->

        </div> <!-- /CONFIRMATION -->


        <?php
            require_once('includes/footer.php');
        ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/jquery.color.js"></script>
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
