<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('includes/connexion.php');
    
    if(isset($_POST['txtAdresse'],$_POST['txtVille'],$_POST['txtCp'])) //si l'utilisateur a rempli les champs
    {
        $ajd=date("Y-m-d");
        $paiement = $_POST['selPaiement'];
        $courriel = $_SESSION['courriel'];

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
       
        $adresse = trim($adresse);
        $ville = trim($ville);
        $cp = trim($cp);

        $trouve = false;


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

        if ($trouve == true) //erreur
        {
            header("Location:sommaire.php");
            exit();
        }

        else
        {
            try {
                $req = $bdd->prepare("SELECT * FROM membre WHERE courriel=:courriel"); //va chercher info du membre
                $req->execute(array(
                    'courriel' => $courriel));

                if ($donnees = $req->fetch())
                {
                    $id = $donnees['id'];

                    //ajoute info commande dans la table commande
                    $req = $bdd->prepare('INSERT INTO commande(id_membre,adresse_livraison, app_livraison, ville, cp_livraison, date_commande, paiement) 
                    VALUES(:membre, :adresse, :app, :ville, :cp, :ajd, :paiement)');
                    $req->execute(array(
                        'membre' => $id,
                        'adresse' => $adresse,
                        'app' => $app,
                        'ville' => $ville,
                        'cp' => $cp,
                        'ajd' => $ajd,
                        'paiement' => $paiement  ));

                    if ($req->rowCount()!=0) 
                    {
                        //va chercher id de la commande qui vient d'être ajouté
                        $req = $bdd->prepare("SELECT * FROM commande ORDER BY id DESC LIMIT 1");
                        $req->execute();

                        if ($donnees = $req->fetch())
                        {
                            $idCommande = $donnees['id'];
        
                            for($i=0; $i<sizeof($_SESSION['tabId']); $i++) //parcourt le tableau id mets
                            {
                                $idMets = $_SESSION['tabId'][$i];
                                $qte = $_SESSION['tabQte'][$i];

                                //ajout dans la table ligne_commande
                                $req = $bdd->prepare('INSERT INTO ligne_commande(id_mets, id_commande, qte) 
                                VALUES(:mets, :commande, :qte)');
                                $req->execute(array(
                                    'mets' => $idMets,
                                    'commande' => $idCommande,
                                    'qte' => $qte ));
                            }


                            header("Location:confirmation.php?adresse=".$adresse.'&app='.$app.'&ville='.$ville.'&cp='.$cp);
                            exit();
                        }

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