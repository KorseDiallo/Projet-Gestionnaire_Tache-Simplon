<!-- <?php 
    echo "<pre>";
    var_dump($_POST["ajouter"]);
    echo "</pre>";
    if(isset($_POST["ajouter"])){
        if(!empty($_POST["task-title"]) && !empty($_POST["task-priority"]) && !empty($_POST["date_echeance"]) && !empty($_POST["task-status"]) && !empty($_POST["task-description"])){
            $title= $_POST["task-title"];
            $description= $_POST["task-description"];

            if($_POST["task-priority"] == "haute" || $_POST["task-priority"] == "moyenne" || $_POST["task-priority"] == "basse"){
                $haute= $_POST["task-priority"] == "haute";
                $moyenne=$_POST["task-priority"] == "moyenne";
                $basse=$_POST["task-priority"] == "basse";
            }else if($_POST["task-status"] == "encours" || $_POST["task-status"] == "enattente" || $_POST["task-status"] == "terminee"){
                $encours=$_POST["task-status"] == "encours";
                $enattente=$_POST["task-status"] == "enattente";
                $terminee=$_POST["task-status"] == "terminee";
            }

        }else{
            echo "veuillez saisir tous les champs";
        }
    }

?> -->


<?php
    session_start();
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

    <div class="task-container">
        <h1 class="lp">Préparation d'une rapport de vente</h1>
        <p>Recueillir les données de vente, générer des graphiques et rédiger un rapport détaillé.</p>
        <div class="inline-elements">
            <p>Priorité: Haute</p>
            <p class="paragraph">Statut: En cours</p>
            <button><a href="details.php">Voir les détails</a></button>
        </div>
    </div>


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
