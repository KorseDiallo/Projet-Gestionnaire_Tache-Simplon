<?php 
session_start();
require_once("dbConnexion.php");

if (isset($_GET['id'])) {
    $taskID = $_GET['id']; // Récupérer l'ID de la tâche depuis l'URL
    $_SESSION["id_tache"] = $taskID;
    $tacheSelect = $connexion->prepare("SELECT * FROM tache WHERE id_utilisateur = :id_utilisateur AND id = :task_id");
    $tacheSelect->execute(["id_utilisateur" => $_SESSION["id"], "task_id" => $taskID]);
    $taskDetails = $tacheSelect->fetch(PDO::FETCH_ASSOC);


    
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Details de la Tâche</title>
    <link rel="stylesheet" href="styleDetails.css">
</head>

<body>

    <div class="navbar">
        <h1>Details Tâche : <?php echo $taskDetails["titre"]; ?></h1>
    </div>

    <div class="task-details">
        <h1 class="lp">Nom de la Tâche</h1>
        <div class="inline-elements">
            <p class="priority">Priorité: <?php echo $taskDetails["priorite"]; ?></p>
            <p class="status">Statut: <?php echo $taskDetails["status"]; ?></p>
        </div>
        <p><?php echo $taskDetails["description"]; ?></p>

        <div class="button-container">
            <form action="verifTerminerSupprimer.php" method="post">
                <!-- <button id="markCompleted" style:"background-color:green">Marquer comme terminé</button> -->
                <input type="hidden" value='<?php echo  $taskID; ?>' name="tache">
                <input type="submit" value="Marquer comme terminer" name="terminer" style="background-color:green;padding:10px;color:white">
                <!-- <button id="deleteTask" style="background-color:red">Supprimer la tâche</button> -->
                <input type="submit" value="Supprimer la tâche" name="supprimer" style="background-color:red;padding:10px; color:white" >
            </form>
        </div>
    </div>
    
    <div class="button-container">
        <!-- <button id="returnToList" ">Retour à la liste des tâches</button> -->
        <a href="taches.php">Retour à la liste des tâches</a>
    </div>
</body>

</html>
