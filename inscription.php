<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
    <link rel="stylesheet" href="styleInscription.css">
</head>

<body>
    <div class="navbar">
        <h1>Création de compte et Connexion</h1>
    </div>
    <div class="container">
        <div class="form-container">
            <h2>Connexion</h2>
            <form action="verifInscriptionConnexion.php" method="post">

                <div>
                    <label for="login-nom">Nom :</label><br>
                    <input type="text" id="login-nom" name="login-nom" >
                </div>
                <div>
                    <label for="login-motdepasse">Mot de passe :</label><br>
                    <input type="password" id="login-motdepasse" name="login-motdepasse" >
                </div>
                <button type="submit" name="connecter">Se Connecter</button>
            </form>
        </div>
        <hr>
        <div class="form-container">
            <h2>Inscription</h2>
            <form action="verifInscriptionConnexion.php" method="post">
            <div>
                <label for="nom">Nom D'utilisateur :</label> <br>
                <input type="text" id="nom" name="nom" >
            </div>
            <div>
                <label for="email">Email :</label> <br>
                <input type="text" id="email" name="email" >
            </div>
            <div>
                <label for="motdepasse">Mot de passe :</label> <br>
                <input type="password" id="motdepasse" name="motdepasse" >
            </div>
            <div>
                <label for="confirmationMotDePasse">Confirmation Mot de passe :</label> <br>
                <input type="password" id="confirmationMotDePasse" name="confirmationMotDePasse" >
            </div>
            <button type="submit" name="inscription">S'Inscrire</button> 
            <div><a href="passwordOublier.php">Mot de passe oublié??</a></div>
            </form>
        </div>
    </div>
</body>

</html>