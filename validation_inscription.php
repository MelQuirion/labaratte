<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('includes/connexion.php');
    
    //si l'utilisateur a rempli les champs
    if(isset($_POST['txtNom'],$_POST['txtPrenom'],$_POST['txtAdresse'],$_POST['txtVille'],$_POST['txtCp'], $_POST['txtTel'],$_POST['txtJour'],$_POST['selMois'],$_POST['txtAnnee'], $_POST['txtCourriel'], $_POST['txtMdp'], $_POST['txtEnfant'], $_POST['txtRefere']))
    {

        $nom = $_POST['txtNom'];
        $prenom = $_POST['txtPrenom'];
        $adresse = $_POST['txtAdresse'];

        if (isset($_POST['txtApp']))
        {
            $app = trim($_POST['txtApp']);
        }
        else
        {
            $app = "";
        }

        $ville = $_POST['txtVille'];
        $cp = $_POST['txtCp'];
        $tel = $_POST['txtTel'];
        $jour = intval($_POST['txtJour']);
        $mois = intval($_POST['selMois']);
        $annee = intval($_POST['txtAnnee']);

        $courriel = $_POST['txtCourriel'];
        $mdp = $_POST['txtMdp'];

        $enfant = $_POST['txtEnfant'];
        $refere = $_POST['txtRefere'];

        $nom = trim($nom);
        $prenom = trim($prenom);
        $adresse = trim($adresse);
        $ville = trim($ville);
        $cp = trim($cp);
        $tel = trim($tel);

        $courriel = trim($courriel);
        $mdp = trim($mdp);

        $refere = trim($refere);

        $trouve = false;

        if (!preg_match('/^[a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+([ -][a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+)?$/', $nom))
        {
            $trouve = true;
        }

        if (!preg_match('/^[a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+([ -][a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+)?$/', $prenom))
        {
            $trouve = true;
        }

        if ($adresse == "")
        {
            $trouve = true;
        }

        if (($app != "") && (!preg_match('/^[a-z0-9]+?$/', $app)))
        {
            $trouve = true;
        }

        if (!preg_match('/^[a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+([ -][a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+)?$/', $ville))
        {
            $trouve = true;
        }

        if (!preg_match('/^[A-Z][0-9][A-Z] [0-9][A-Z][0-9]$/', $cp))
        {
            $trouve = true;
        }

        if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $tel))
        {
            $trouve = true;
        }



        if (checkdate($mois, $jour, $annee))
        {
            $today=date("Y-m-d");
            $today=new DateTime($today);
            $today=$today->format("Y-m-d");
            $ddn = $annee.'-'.$mois.'-'.$jour;
            if($ddn>$today)
            {
                $trouve = true;
            }
        } 
        else
        {
            $trouve = true;
        }


        if (!preg_match('/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/i', $courriel)) // source de l'expression régulière : https://openclassrooms.com/courses/dynamisez-vos-sites-web-avec-javascript/les-expressions-regulieres-partie-2-2-1
        {
            $trouve = true;
        }

        if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $mdp)) // source de l'expression régulière : http://www.the-art-of-web.com/javascript/validate-password/
        {
            $trouve = true;
        }

        if ($enfant =="" || $enfant < 0)
        {
            $trouve = true;
        }

        if (!preg_match('/^[a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+([ -][a-zéèêëïçàâäùûA-ZÉÈÊËÏÇÀÂÄÙÛ]+)?$/', $refere))
        {
            $trouve = true;
        }


        $sexe = $_POST['rbSexe'];
        $amerindien = $_POST['rbAmerindien'];
        $immigrant = $_POST['rbImmigrant'];
        $sit_familiale = $_POST['selFamiliale'];
        $sit_financiere = $_POST['selFinanciere'];
        $revenu = $_POST['selRevenu'];
        $lieu = $_POST['selLieuAchat'];

        if ($trouve == true) //erreur
        {
            header("Location:inscription.php");
            exit();
        }

        else
        {
            try {
                    //vérifie si adresse courriel déjà associé à un membre
                    $req = $bdd->prepare("SELECT * FROM membre WHERE courriel=:courriel");
                    $req->execute(array(
                        'courriel' => $courriel));

                    if ($donnees = $req->fetch())
                    {
                        $_SESSION['errCourriel'] = "Courriel déjà lié à un compte";
                        header("Location:inscription.php");
                        exit();
                    }
                    else
                    {
                        //ajout du membre dans la table membre
                        $req = $bdd->prepare('INSERT INTO membre(prenom, nom, adresse, app, ville, cp, tel, ddn, sexe, amerindien, immigrant, courriel, mdp, sit_familiale, nb_enfants, sit_financiere, revenu, lieu_achat, refere_par, date_inscription) 
                        VALUES(:prenom, :nom, :adresse, :app, :ville, :cp, :tel, :ddn, :sexe, :amerindien, :immigrant, :courriel, :mdp, :familiale, :enfant, :financiere, :revenu, :lieu, :refere, :inscription)');
                        $req->execute(array(
                            'prenom' => $prenom,
                            'nom' => $nom,
                            'adresse' => $adresse,
                            'app' => $app,
                            'ville' => $ville,
                            'cp' => $cp,
                            'tel' => $tel,
                            'ddn' => $ddn,
                            'sexe' => $sexe,
                            'amerindien' => $amerindien,
                            'immigrant' => $immigrant,
                            'courriel' => $courriel,
                            'mdp' => $mdp,
                            'familiale' => $sit_familiale,
                            'enfant' => $enfant,
                            'financiere' => $sit_financiere,
                            'revenu' => $revenu,
                            'lieu' => $lieu,
                            'refere' => $refere,
                            'inscription' => $today   ));

                        if ($req->rowCount()!=0) 
                        {
                            $_SESSION['courriel'] = $courriel;
                            header("Location:index.php");
                            exit();
                        }
                        else
                        {
                            echo "<p>Erreur lors de l'ajout.</p>";
                        }
                    }
                } catch (PDOException $e) {
                    exit( "Erreur lors de l'exécution de la requête SQL :<br />\n" .  $e -> getMessage() . "<br />\nREQUÊTE = INSERT");
                }   
            $req->closeCursor();
            $bdd = null;
        }   
    }
?>