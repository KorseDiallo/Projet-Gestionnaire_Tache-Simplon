<?php
session_start();
    require_once("dbConnexion.php");

    if(isset($_POST["supprimer"])){
        $deleteTache = $connexion->prepare("DELETE FROM tache WHERE id = :id");
        $deleteTache->execute(["id" => $_SESSION["id_tache"]]);
        header("location:taches.php");
    }
    

    if(isset($_POST["terminer"])){
        $tacheId=$_POST["tache"];
        $updateTache = $connexion->prepare("UPDATE tache SET status = 'terminé' WHERE id = :id");
        $updateTache->execute(["id" => $_SESSION["id_tache"]]);
        header("location:taches.php");
    }
    
?>