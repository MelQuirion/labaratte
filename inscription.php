<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Inscription</title>
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

        <div id="inscription" class="container"> <!-- DÉBUT INSCRIPTION -->
            <h2>Inscription</h2>
            <form method="post" action="validation_inscription.php"> <!-- DÉBUT FORM -->
                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <div class="champ clearfix">
                        <label for="txtPrenom">Prénom :</label>
                        <input type="text" name="txtPrenom" id="txtPrenom">
                        <img src="img/error.png" alt="erreur" id="errPrenom">
                        <span id="errTextPrenom" class="erreur">Prénom</span>
                    </div>

                    <div class="champ clearfix">
                        <label for="txtNom" class="col-droite">Nom :</label>
                        <input type="text" name="txtNom" id="txtNom">
                        <img src="img/error.png" alt="erreur" id="errNom">
                        <span id="errTextNom" class="erreur">Nom</span>
                    </div>
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <div class="champ clearfix">
                        <label for="txtAdresse">Adresse :</label>
                        <input type="text" name="txtAdresse" id="txtAdresse">
                        <img src="img/error.png" alt="erreur" id="errAdresse">
                        <span id="errTextAdresse" class="erreur">Adresse</span>
                    </div>

                    <div class="champ clearfix">
                        <label for="txtApp" class="col-droite">App. :</label>
                        <input type="text" name="txtApp" id="txtApp">
                        <img src="img/error.png" alt="erreur" id="errApp">
                        <span id="errTextApp" class="erreur">App</span>
                    </div>
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <div class="champ clearfix">
                        <label for="txtVille">Ville :</label>
                        <input type="text" name="txtVille" id="txtVille">
                        <img src="img/error.png" alt="erreur" id="errVille">
                        <span id="errTextVille" class="erreur">Ville</span>
                    </div>

                    <div class="champ clearfix">
                        <label for="txtCp" class="col-droite">Code postal :</label>
                        <input type="text" name="txtCp" id="txtCp" placeholder="A1A 1A1">
                        <img src="img/error.png" alt="erreur" id="errCp">
                        <span id="errTextCp" class="erreur">Code postal</span>
                    </div>
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <div class="champ clearfix">
                        <label for="txtTel">Téléphone :</label>
                        <input type="text" name="txtTel" id="txtTel" placeholder="418-555-5555">
                        <img src="img/error.png" alt="erreur" id="errTel">
                        <span id="errTextTel" class="erreur">Téléphone</span>
                    </div>

                    <div class="champ clearfix">
                        <label for="txtJour" class="col-droite">Date de naissance :</label>
                        <input type="text" name="txtJour" id="txtJour" placeholder="JJ"><span class="spanDdn">/</span>


                        <select name="selMois" id="selMois">
                            <option value="00">  </option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> 
                        <span class="spanDdn">/</span>
                        <input type="text" name="txtAnnee" id="txtAnnee" placeholder="AAAA">
                        <img src="img/error.png" alt="erreur" id="errDdn">
                        <span id="errTextDdn" class="erreur">Date de naissance</span>
                    </div>
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                        <label for="rbSexe">Sexe :</label>
                        <input type="radio" name="rbSexe" value="f" checked id="rbSexe"><span class="spanRb">Femme</span>
                        <input type="radio" name="rbSexe" value="m"><span class="spanRb">Homme</span>

                        <label for="rbAmerindien">Amérindien :</label>
                        <input type="radio" name="rbAmerindien" value="oui" id="rbAmerindien"><span class="spanRb">Oui</span>
                        <input type="radio" name="rbAmerindien" value="non" checked><span class="spanRb">Non</span>

                        <label for="rbImmigrant">Immigrant :</label>
                        <input type="radio" name="rbImmigrant" value="oui" id="rbImmigrant"><span class="spanRb">Oui</span>
                        <input type="radio" name="rbImmigrant" value="non" checked><span>Non</span>
                </div> <!-- /ROW -->


                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <div class="champ clearfix">
                        <label for="txtCourriel">Courriel :</label>
                        <input type="email" name="txtCourriel" id="txtCourriel">
                        <img src="img/error.png" alt="erreur" id="errCourriel">
                        <span id="errTextCourriel" class="erreur">Courriel</span>
                    </div>

                    <div class="champ clearfix">
                        <label for="txtMdp" class="col-droite">Mot de passe :</label>
                        <input type="password" name="txtMdp" id="txtMdp">
                        <img src="img/error.png" alt="erreur" id="errMdp">
                        <span id="errTextMdp" class="erreur">Mot de passe</span>
                    </div>
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <div class="champ clearfix">
                        <label for="selFamiliale">Situation familiale :</label>
                        <select name="selFamiliale" id="selFamiliale">
                            <option value="couple">Couple</option>
                            <option value="monoparentale">Monoparentale</option>
                            <option value="seule">Seule</option>
                            <option value="autre">Autre</option>
                        </select> 
                    </div>

                    <div class="champ clearfix">
                        <label for="txtEnfant" class="col-droite">Nombre d'enfants :</label>
                        <input type="number" name="txtEnfant" id="txtEnfant" min="0" max="30">
                        <img src="img/error.png" alt="erreur" id="errEnfant">
                        <span id="errTextEnfant" class="erreur">Nombre d'enfants</span>
                    </div>
                </div> <!-- /ROW -->

                <div class="row clearfix">  <!-- DÉBUT ROW -->
                    <label for="selFinanciere">Situation financière :</label>
                    <select name="selFinanciere" id="selFinanciere">
                        <option value="bs">Prestataire de la sécurité du revenu (BS)</option>
                        <option value="ae">Prestataire de l’assurance-emploi (AE)</option>
                        <option value="aucunrevenu">Sans chèque (aucun revenu)</option>
                        <option value="avecpret">Étudiant-e avec prêt et bourse </option>
                        <option value="sanspret">Étudiant-e sans prêt et bourse </option>
                        <option value="salarie">Salarié-e</option>
                        <option value="autre">Autre</option>
                    </select> 
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <label for="selRevenu">Revenu familial annuel :</label>
                    <select name="selRevenu" id="selRevenu">
                        <option value="0-5000">0 $ à 5 000 $</option>
                        <option value="5001-12000">5 001 $ à 12 000 $</option>
                        <option value="12001-20191">12 001 $ à 20 191 $</option>
                        <option value="20192-25240">20 192 $ à 25 240 $</option>
                        <option value="25241-31389">25 241 $ à 31 389 $</option>
                        <option value="31390-37998">31 390 $ à 37 998 $</option>
                        <option value="37999-42475">37 999 $ à 42 475 $</option>
                        <option value="42476-46952">42 476 $ à 46 952 $</option>
                        <option value="46953-51429">46 953 $ à 51 429 $</option>
                        <option value="51430">plus de 51 430 $</option>
                    </select>
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <label for="selLieuAchat">Lieu d'achat souhaité :</label>
                    <select name="selLieuAchat" id="selLieuAchat">
                        <option value="baratte" selected>Café de La Baratte</option>
                        <option value="basse ville">Comptoir Basse Ville</option>
                        <option value="claude-allard">Comptoir Claude-Allard</option>
                        <option value="croissance">Comptoir Croissance</option>
                        <option value="accorderie">Comptoir L'Accorderie</option>
                        <option value="montcalm">Comptoir Montcalm</option>
                    </select> 
                </div> <!-- /ROW -->

                <div class="row clearfix"> <!-- DÉBUT ROW -->
                    <label for="txtRefere">Référé par :</label>
                    <input type="text" name="txtRefere" id="txtRefere">
                    <img src="img/error.png" alt="erreur" id="errRefere">
                    <span id="errTextRefere" class="erreur">Référé</span>
                </div> <!-- /ROW -->

                <div class="clearfix button">
                    <input type="submit" value="Inscription">
                </div>
            </form> <!-- /FORM -->
        </div> <!-- /INSCRIPTION -->


        <?php
            require_once('includes/footer.php');
        ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/jquery.color.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/inscription.js"></script>

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
