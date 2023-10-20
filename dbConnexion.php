<?php 

try
{
	// On se connecte à MySQL
	$connexion= new PDO('mysql:host=localhost;dbname=gestionnaire;charset=utf8', 'root', '');
    // echo"connexion reçue";
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}





?>