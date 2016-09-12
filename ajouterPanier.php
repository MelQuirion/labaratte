<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['courriel'])) //si l'utilisateur n'est pas connecté
    {
        header("Location:mets_congeles.php?mess=Connexion");
        exit();
    }
    else
    {
        if(isset($_GET['idMets']) && isset($_GET['txtQte']))
        {
            if(!isset($_SESSION['tabId'])) //si le panier n'existe pas
            {
                $_SESSION['tabId'] = array();
                $_SESSION['tabQte'] = array();
            }

            $trouve = false;
            for($i=0; $i<sizeof($_SESSION['tabId']); $i++) //vérifie si le produit est déjà dans le panier
            {
                if ($_SESSION['tabId'][$i] == $_GET['idMets']) //produit déjà dans le panier, on additionne la quantité à la quantité déjà existante
                {
                    $qte = $_SESSION['tabQte'][$i] + $_GET['txtQte'];
                    $_SESSION['tabQte'][$i] = $qte;
                    $trouve = true;
                }
            }

            if (!$trouve) //produit pas déjà dans le panier
            {
                $position = sizeof($_SESSION['tabId']);
                $_SESSION['tabId'][$position] = $_GET['idMets'];
                $_SESSION['tabQte'][$position] = $_GET['txtQte'];
            }

        }
        header("Location:mets_congeles.php?mess=Ajout");
        exit();
    }
?>