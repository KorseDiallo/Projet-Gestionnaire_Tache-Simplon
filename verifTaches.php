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

            //REQUETE INSERTION TACHE
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
            // FIN REQUETE INSERTION TACHE

// REQUETE SELECTION TACHE
    // $tacheSelect= $connexion->prepare("SELECT * FROM tache");
    // $tacheSelect->execute(); 

    // $valid= $tacheSelect->fetchAll(PDO::FETCH_ASSOC);
    // $_SESSION["selectTache"]=[];  
    // $_SESSION["selectTache"]=$valid;  
    
    header("location:taches.php");
    exit();
//  FIN REQUETE SELECTION TACHE
   
            
        }else{
            echo "veuillez saisir tous les champs";
        }
    }

?>