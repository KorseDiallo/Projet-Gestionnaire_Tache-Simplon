<?php 
require_once("dbConnexion.php");

function emailValide($email){
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    return preg_match($pattern, $email);
}

    if(isset($_POST["reini"])){
        if(!empty($_POST["email"]) && !empty($_POST["newPassword"]) && !empty($_POST["confirmPassword"])){
            $email=$_POST["email"];
            $newPassword=md5($_POST["newPassword"]);
            $confirmPassword=md5($_POST["confirmPassword"]);

            $verifieEmail= emailValide($email);

            if(!$verifieEmail){
                echo "l'email n'est pas valide";
            }else if($newPassword<7 || $confirmPassword<7){
                echo "votre mot de passe doit avoir minumum sept caractère";
            }else if($newPassword!=$confirmPassword){
                echo "les mots de passe doivent être identique";
            }else{
                $selectionQuery = 'SELECT * FROM utilisateur WHERE email= :email';

                $insertUser = $connexion->prepare($selectionQuery);

                $insertUser->execute([
                            'email' => $email,
                        ]);
                    if($insertUser->rowCount()>0){
                        $value= $insertUser->fetch(PDO::FETCH_ASSOC);
                        $id_value=$value["id"];

                        $modifMotDePasse = 'UPDATE utilisateur SET motdepasse= :motdepasse';

                        $req = $connexion->prepare($modifMotDePasse);
        
                        $req->execute([
                                    'motdepasse' => $newPassword,
                                ]);
                            echo "le mot de passe a été modifié avec succès";
                             header("location:inscription.php");

                        // echo "<pre>";
                        // var_dump($id_value);
                        // echo "</pre>";
                        // die();
                    }else{
                        echo"l'email que vous avez saisie n'as pas de compte";
                    }
                    
            }

        }else{
            echo "Veuillez saisir tous les champs";
        }
    }
?>