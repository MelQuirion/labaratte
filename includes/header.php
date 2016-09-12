<?php 

    $nomPage = basename($_SERVER['PHP_SELF']);  

    include('includes/connexion.php');
    if (isset($_POST['textCourriel']) && isset($_POST['textMdp'])) //si l'utilisateur a rempli le formulaire de connexion
    {

        try {
                $req = $bdd->prepare("SELECT * FROM membre WHERE courriel=:courriel AND mdp=:mdp"); //recherche membre
                $req->execute(array('courriel' => $_POST['textCourriel'], 'mdp' => $_POST['textMdp']));

                if ($donnees = $req->fetch()) //membre trouvé
                {
                    $_SESSION['courriel'] = $_POST['textCourriel'];
                }
                else
                {
                    $erreur = "Courriel et/ou mot de passe invalide";
                }
            } catch (PDOException $e) {
                exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = SELECT");
            }
            $req->closeCursor();
            // $bdd = null;    
    }
?>
<header>
    <div class="container clearfix">
        <img src="img/logo.jpg" alt="Logo La Baratte" class="logo">
        <div id="menus" class="clearfix">
                <?php
                    if (isset($_SESSION['courriel'])) //menu si utilisateur connecté
                    {
                    ?>
                        <ul id="menu-membre" class="clearfix">
                            <li id="icone-panier"><a href="panier.php"><img src="img/panier.png"></a></li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                        </ul>
                    <?php
                    }
                    else
                    {
                    ?>
                        <ul id="menu-membre" class="clearfix">
                            <li><a href="" id="btnLogin">Connexion</a></li>
                            <li><a href="inscription.php">Inscription</a></li>
                        </ul>
                    <?php
                    }
                ?>

            <nav>
                <ul class="clearfix"> 
                    <li><a <?php if ($nomPage == "index.php") {echo "href=#";} else {echo 'href="index.php"';} ?>>Accueil</a></li>
                    <li><a <?php if ($nomPage == "mets_congeles.php") {echo "href=#";} else {echo 'href="mets_congeles.php"';} ?>>Commander</a></li>
                    <li><a href="">À propos</a>
                            <ul class="sous-menu">
                              <li><a href="reinsertionsociale.php">Réinsertion sociale</a></li>
                              <li><a href="mission.php">Mission et objectifs</a></li>
                              <li><a href="historique.php">Historique et statistiques</a></li>
                            </ul>
                    </li>
                    <li><a <?php if ($nomPage == "contact.php") {echo "href=#";} else {echo 'href="contact.php"';} ?>>Contact</a></li>
                    <li class="don"><a href="don.php">Faire un don</a></li>
                    <li><a href="https://www.facebook.com/La-Baratte-327946823924518"  target="_blank"><img src="img/fb.png" alt="Logo Facebook" class="animated rubberBand option_animation"></a></li>
                    <li><a href="https://www.linkedin.com/company/la-baratte"  target="_blank"><img src="img/in.png" alt="Logo LinkedIn" class="animated rubberBand option_animation"></a></li>
                </ul>
            </nav>
        </div>


        <!-- FORMULAIRE CONNEXION -->
        <div id="overlay" <?php if (isset($erreur)){echo 'class="overlay"';} ?>>
            <div id="popUpLogin" <?php if (isset($erreur)){echo 'style="display:block"';} ?>>
                <h2>Connexion</h2>
                <span id="errLogin" <?php if (isset($erreur)){echo 'style="visibility:visible"';} ?>>Courriel et/ou mot de passe invalide</span>
                <form method="post" action="">
                    <div class="clearfix">
                        <label for="textCourriel">Courriel :</label>
                        <input type="email" name="textCourriel" id="textCourriel">
                    </div>

                    <div class="clearfix">
                        <label for="textMdp">Mot de passe :</label>
                        <input type="password" name="textMdp" id="textMdp">
                    </div>

                    <input type="submit" id="btnConnexion" value="Connexion">
                    <input type="submit" id="btnFermer" value="X">
                </form>
            </div>
        </div>
    </div>

</header>


<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="js/header.js"></script>