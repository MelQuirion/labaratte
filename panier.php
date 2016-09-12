<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //si l'utilisateur n'est pas connecté
    if (!isset($_SESSION['courriel']))
    {
        header("Location:index.php");
        exit();
    }

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Panier</title>
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

        <div id="panier" class="container clearfix"> <!-- DÉBUT PANIER -->
            <h2>Panier</h2>
            <div class="clearfix titre-panier">
                <p>Prix</p>
                <p>Quantité</p>
            </div>

            <!-- AFFICHAGE METS DANS LE PANIER -->
            <?php
                if (isset($_SESSION['tabId']))
                {
                    $total = 0;
                    $nbContenant = 0;

                    for($i=0; $i<sizeof($_SESSION['tabId']); $i++) //parcourt tableau contenant les id mets
                    {
                        $idMets = $_SESSION['tabId'][$i];
                        $qte = $_SESSION['tabQte'][$i];

                        //va chercher info mets
                        try {
                                $req = $bdd->prepare("SELECT * FROM mets WHERE id=:id");
                                $req->execute(array('id' => $idMets));

                                if ($donnees = $req->fetch())
                                {
                                    $nbContenant += $qte;
                                    $total = $total + $donnees['prix']*$qte;
                                    $total = number_format($total, 2, '.', ' ');
                                    
                                    ?>
                                    <div class="item clearfix"> <!-- DÉBUT ITEM -->
                                        <img src="<?php echo 'img/mets/vignettes/'.$donnees['img'];?>" alt="<?php echo $donnees['nom'] ?>">
                                        <div class="nom-format">
                                            <h3><?php echo $donnees['nom'] ?></h3>
                                            <p><?php echo $donnees['format'] ?></p>
                                        </div>
                                        <p class="prix"><?php echo $donnees['prix'] . ' $' ?></p>

                                        <form method="get" action="modifierPanier.php">
                                            <button class="btnMoins">-</button>
                                            <input type="text" name="txtQte" id="txtQte" value="<?php echo $qte; ?>" readonly>
                                            <button class="btnPlus">+</button><br>
                                            <input type="submit" value="Modifier">
                                            <input type="hidden" name="idMets" value="<?php echo $donnees['id']; ?>">
                                        </form>
                                    </div> <!-- /ITEM -->
                                    <?php
                                }

                            } catch (PDOException $e) {
                                exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = SELECT");
                            }
                            $req->closeCursor();
                    }
                    $bdd = null;   
                }  
            ?>
            <!-- /AFFICHAGE METS DANS LE PANIER -->

            <!-- AFFICHAGE TOTAL -->
            <div class="total clearfix">
                <div class="clearfix">
                    <p>Total <span>(<?php echo $nbContenant; if($nbContenant<=1){ echo ' contenant';} else{ echo ' contenants';} ?>)</span> :</p>
                    <p><?php echo $total . ' $' ?></p>
                </div>
                <div class="clearfix bouton">
                    <a href="sommaire.php">Commander</a>
                </div> 
            </div> 
            <!-- /AFFICHAGE TOTAL -->
            
        </div> <!-- /PANIER -->


        <?php
            require_once('includes/footer.php');
        ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/jquery.color.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/panier.js"></script>

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

