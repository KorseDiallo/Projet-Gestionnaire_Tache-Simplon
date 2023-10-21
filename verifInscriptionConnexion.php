<?php 
session_start();
require_once("dbConnexion.php");
function emailValide($email){
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    return preg_match($pattern, $email);
}
$regex_nom = "/^[a-zA-Z]{2,}$/";

// echo "<pre>";
// print_r($_POST["inscription"]);
// die();
// echo "</pre>";


    // verification inscription  et creation  des requetes sql
    if(isset($_POST["inscription"])){
        if(!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["motdepasse"]) && !empty($_POST["confirmationMotDePasse"])){
            $nom= htmlspecialchars($_POST["nom"]);
            $email= htmlspecialchars($_POST["email"]);
            $motdepasse= md5($_POST["motdepasse"]);
            $confirmationmotdepasse= md5($_POST["confirmationMotDePasse"]);
            $verifieEmail= emailValide($email);
            if(strlen($nom)>25){
                echo "votre nom est trop long";
            }else if(!preg_match($regex_nom,$nom)){
                echo "le nom n'est pas valide";
            } else if(!$verifieEmail){
                echo "votre email n'est pas correct";
            }else if(strlen($motdepasse)<7 || strlen($confirmationmotdepasse)<7){
                echo "votre mot de passe doit avoir minumum sept caractère";
            }else if($motdepasse!=$confirmationmotdepasse){
                echo "les mots de passe doivent être identique";
            }else{
                $sqlQuery = 'INSERT INTO utilisateur (nom, email, motdepasse) VALUES (:nom, :email, :motdepasse)';

                $insertUser = $connexion->prepare($sqlQuery);

                $insertUser->execute([
                            'nom' => $nom,
                            'email' => $email,
                            'motdepasse' => $motdepasse
                        ]);

                // echo "Inscription reussie";
                 header("location:inscription.php");
            }
           
        }else{
            echo "veuillez remplir tous les champs";
        }
    }
    // fin verification inscription et creation  des requetes sql



    // Verification connexion et creation  des requetes sql
    if(isset($_POST["connecter"])){
        if(!empty($_POST["login-nom"]) && !empty($_POST["login-motdepasse"])){
            $nom= htmlspecialchars($_POST["login-nom"]);
            $motdepasse= md5($_POST["login-motdepasse"]);

            if(strlen($nom)>25){
                echo "votre nom est trop long";
            }else if(!preg_match($regex_nom,$nom)){
                echo "le nom n'est pas valide";
            }else if(!preg_match($regex_nom,$nom)){
                echo "le nom n'est pas valide";
            } else if(strlen($motdepasse)<7){
                echo "votre mot de passe doit avoir minumum sept caractères";
            }else{
                $sqlQuery= 'select * from utilisateur where nom=:nom AND motdepasse=:motdepasse';
                $selectUser = $connexion->prepare($sqlQuery);
                $selectUser->execute([
                    "nom"=>$nom,
                    "motdepasse"=>$motdepasse
                ]);

                if($selectUser->rowCount()>0){
                    // echo "connexion reçue";
                    // echo "<br>";
                   $user= $selectUser->fetch(PDO::FETCH_ASSOC);
                //    echo "<pre>";
                //    var_dump($user);
                //    die();
                //    echo "</pre>";
                   $_SESSION["id"]=$user["id"];
                   $_SESSION["userName"]=$user["nom"];
                    header("location:taches.php");
                    exit();
                }else{
                    echo "Votre email ou mot de passe est incorrect";
                    echo "<br>";
                }
            }
           
        }else{
            echo "veuillez remplir tous les champs";
        }
    }

    // fin verification connexion et creation  des requetes sql
?>