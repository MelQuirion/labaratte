<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('includes/connexion.php');

     //si utilisateur n'est pas connecté
    if (!isset($_SESSION['courriel']))
    {
        header("Location:index.php");
        exit();
    }

    //va chercher les infos du client
    try {
            $req = $bdd->prepare("SELECT adresse, app, ville, cp FROM membre WHERE courriel=:courriel");
            $req->execute(array('courriel' => $_SESSION['courriel']));

            if ($donnees = $req->fetch())
            {
                $adresse = $donnees['adresse'];
                $app = $donnees['app'];
                $ville = $donnees['ville'];
                $cp = $donnees['cp'];
            }

        } catch (PDOException $e) {
            exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = SELECT");
        }
        $req->closeCursor();
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

        <div id="sommaire" class="container clearfix"> <!-- DÉBUT SOMMAIRE -->
            <h2>Sommaire de la commande</h2>

                <form method="post" action="validation_commande.php"> <!-- DÉBUT FORM -->
                    <h3>Adresse de livraison</h3>
                    <div class="row clearfix"> <!-- DÉBUT ROW -->
                        <div class="champ clearfix">
                            <label for="txtAdresse">Adresse :</label>
                            <input type="text" name="txtAdresse" id="txtAdresse" value="<?php echo $adresse ?>">
                            <img src="img/error.png" alt="erreur" id="errAdresse">
                            <span id="errTextAdresse" class="erreur">Adresse</span>
                        </div>

                        <div class="champ clearfix">
                            <label for="txtApp" class="col-droite">App. :</label>
                            <input type="text" name="txtApp" id="txtApp" value="<?php echo $app ?>">
                            <img src="img/error.png" alt="erreur" id="errApp">
                            <span id="errTextApp" class="erreur">App</span>
                        </div>
                    </div> <!-- /ROW -->

                    <div class="row clearfix"> <!-- DÉBUT ROW -->
                        <div class="champ clearfix">
                            <label for="txtVille">Ville :</label>
                            <input type="text" name="txtVille" id="txtVille" value="<?php echo $ville ?>">
                            <img src="img/error.png" alt="erreur" id="errVille">
                            <span id="errTextVille" class="erreur">Ville</span>
                        </div>

                        <div class="champ clearfix">
                            <label for="txtCp" class="col-droite">Code postal :</label>
                            <input type="text" name="txtCp" id="txtCp" value="<?php echo $cp ?>">
                            <img src="img/error.png" alt="erreur" id="errCp">
                            <span id="errTextCp" class="erreur">Code postal</span>
                        </div>
                    </div> <!-- /ROW -->

                    <h3>Contenu de la commande</h3>
                    <ul class="clearfix">
                        <li>Mets</li>
                        <li>Prix</li>
                        <li>Quantité</li>
                        <li>Sous-total</li>
                    </ul>


                    <!-- AFFICHAGE METS DANS LE PANIER -->
                    <?php
                        if (isset($_SESSION['tabId']))
                        {
                            $total = 0;
                            $nbContenant = 0;

                            for($i=0; $i<sizeof($_SESSION['tabId']); $i++) //parcourt tableau contenant les id mets
                            {
                                $sTotal = 0;
                                $idMets = $_SESSION['tabId'][$i];
                                $qte = $_SESSION['tabQte'][$i];

                                //va chercher info mets
                                try {
                                    $req = $bdd->prepare("SELECT * FROM mets WHERE id=:id");
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
                    ?>
                    <!-- /AFFICHAGE METS DANS LE PANIER -->

                    <!-- AFFICHAGE TOTAL -->
                    <hr>
                    <div class="total clearfix">
                        <div class="clearfix">
                            <p>Total <span>(<?php echo $nbContenant; if($nbContenant<=1){ echo ' contenant';} else{ echo ' contenants';} ?>)</span> :</p>
                            <p><?php echo $total . ' $' ?></p>
                        </div>

                        <div class="clearfix">
                            <label for="selPaiement">Mode de paiement :</label>
                            <select name="selPaiement" id="selPaiement">
                                <option value="Mastercard">Mastercard</option>
                                <option value="Visa">Visa</option>
                                <option value="Paypal">Paypal</option>
                            </select> 
                        </div>
                    </div> 
                    <!-- /AFFICHAGE TOTAL -->

                    <div id="bouton-bottom" class="clearfix">
                        <a href="panier.php" id="btnRetour">Retour au panier</a>
                        <input type="submit" name="action" id="btnConfirmer" value="Confirmer">
                    </div>

                </form><!-- /FORM -->
        </div> <!-- /SOMMAIRE -->


        <?php
            require_once('includes/footer.php');
        ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/jquery.color.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/sommaire.js"></script>

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
