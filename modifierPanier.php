<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_GET['idMets']) && isset($_GET['txtQte'])) //si le panier est déjà créé
    {
        for($i=0; $i<sizeof($_SESSION['tabId']); $i++) //parcourt le tableau id mets
        {
            if ($_SESSION['tabId'][$i] == $_GET['idMets']) 
            {
                if ($_GET['txtQte'] == 0) //qté = 0, on retire l'article du panier
                {
                    unset($_SESSION['tabId'][$i]);
                    unset($_SESSION['tabQte'][$i]);
                    $_SESSION['tabId'] = array_values($_SESSION['tabId']);
                    $_SESSION['tabQte'] = array_values($_SESSION['tabQte']);
                }
                else //modification de la quantité
                {
                    $_SESSION['tabQte'][$i] = $_GET['txtQte'];
                }
            }
        }
    }
    header("Location:panier.php");
    exit();
?>