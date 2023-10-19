<!DOCTYPE html>
<html>

<head>
    <title>Details de la Tâche</title>
    <link rel="stylesheet" href="styleDetails.css">
</head>

<body>
    <div class="navbar">
        <h1>Details Tâche : le nom de la tache</h1>
    </div>

    <div class="task-details">
        <h1 class="lp">Nom de la Tâche</h1>
        <div class="inline-elements">
            <p class="priority">Priorité: Haute</p>
            <p class="status">Statut: En cours</p>
        </div>
        <p>Description de la tâche.</p>

        <div class="button-container">
            <button id="markCompleted" style:"background-color:green">Marquer comme terminé</button>
            <button id="deleteTask" style="background-color:red">Supprimer la tâche</button>
        </div>
    </div>

    <div class="button-container">
        <!-- <button id="returnToList" ">Retour à la liste des tâches</button> -->
        <a href="taches.php">Retour à la liste des tâches</a>
    </div>
</body>

</html>
