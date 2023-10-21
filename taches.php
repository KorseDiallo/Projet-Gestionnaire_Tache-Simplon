
<?php
    session_start();
    require_once("dbConnexion.php");
    // $listesTache= $_SESSION["selectTache"];
    $tacheSelect= $connexion->prepare("SELECT * FROM tache where id_utilisateur=:id_utilisateur");
    $tacheSelect->execute(["id_utilisateur"=>$_SESSION["id"]]); 

    $valid= $tacheSelect->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["selectTache"]=[];  
    $_SESSION["selectTache"]=$valid;  
    $listesTache= $_SESSION["selectTache"];

   
    

?>
<!DOCTYPE html>
<html>

<head>
    <title>Gestion de Mes Tâches</title>
    <link rel="stylesheet" href="styleTaches.css">
</head>

<body>
    <div class="navbar">
        <h1 class="leye">Gestion de Mes Tâches</h1>
        <?php echo  $_SESSION["userName"]; ?>
    </div>
    <?php foreach($listesTache as $value): ?>
    <div class="task-container">
        <h1 class="lp"><?php echo $value["titre"]; ?></h1>
        <p><?php echo $value["description"]; ?></p>
        <div class="inline-elements">
            <p>Priorité: <?php echo $value["priorite"];?></p>
            <p class="paragraph">Statut: <?php echo $value["status"];?></p>
            <button><a href="details.php?id=<?php echo $value["id"]; ?>">Voir les détails</a></button>
        </div>
    </div>

    <?php endforeach; ?>

    <div class="add-task">
        <h1>Ajouter une nouvelle tâche</h1>
        <form action="verifTaches.php" method="post">
        <label for="task-title">Titre:</label>
        <input type="text" id="task-title" name="task-title">

        <label for="task-priority">Priorité:</label>
        <select id="task-priority" name="task-priority">
            <option value="haute">Haute</option>
            <option value="moyenne">Moyenne</option>
            <option value="basse">Basse</option>
        </select>
        <label for="date_echeance">Date d'echeance:</label>
        <input type="datetime-local" id="date_echeance" name="date_echeance">
        <label for="task-status">Statut:</label>
        <select id="task-status" name="task-status">
            <option value="encours">En cours</option>
            <option value="enattente">En attente</option>
            <option value="terminee">Terminée</option>
        </select>

        <label for="task-description">Description:</label>
        <textarea id="task-description" name="task-description" rows="4"></textarea>
        <input type="submit" name="ajouter">
        <!-- <button name="ajouter">Ajouter</button> -->
        </form>
    </div>
</body>

</html>
