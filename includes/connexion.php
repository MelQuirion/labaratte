<?php
include('param_bd.inc');
try
{
	$bdd = new PDO("mysql:host=$dbHote;dbname=$dbNom",$dbUtilisateur, $dbMotPasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );

}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

?>
