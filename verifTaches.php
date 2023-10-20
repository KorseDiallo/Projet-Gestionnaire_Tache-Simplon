<?php 
    session_start();
   require_once("dbConnexion.php");
    if(isset($_POST["ajouter"])){
       
        if(!empty($_POST["task-title"]) && !empty($_POST["task-priority"]) && !empty($_POST["date_echeance"]) && !empty($_POST["task-status"]) && !empty($_POST["task-description"])){
            $titre= htmlspecialchars($_POST["task-title"]);
            $date_echeance=htmlspecialchars($_POST["date_echeance"]);
            $priorite=htmlspecialchars($_POST["task-priority"]);
            $status=htmlspecialchars($_POST["task-status"]);
            $description= htmlspecialchars($_POST["task-description"]);

            $sqlQuery = 'INSERT INTO tache (titre, priorite, date_echeance,description,id_utilisateur) VALUES (:titre, :priorite, :date_echeance,:description,:id_utilisateur)';

                $insertUser = $connexion->prepare($sqlQuery);

                $insertUser->execute([
                            'titre' => $titre,
                            'priorite' => $priorite,
                            'date_echeance' => $date_echeance,
                            'description' => $description,
                            'id_utilisateur' => $_SESSION["id"]
                        ]);

                echo "Tache enregistrer";
                // header(locate:"");
                // echo "<pre>";
                // var_dump($insertUser(fetch(PDO::FETCH_ASSOC)));
                // die();
                // echo "</pre>";
        }else{
            echo "veuillez saisir tous les champs";
        }
    }

?>