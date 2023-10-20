<!DOCTYPE html>
<html>

<head>
    <title>Gestion de Mes Tâches</title>
    <link rel="stylesheet" href="styleTaches.css">
</head>

<body>
    <div class="navbar">
        <h1 class="leye">Gestion de Mes Tâches</h1>
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

        <button name="ajouter">Ajouter</button>
    </div>
</body>

</html>
