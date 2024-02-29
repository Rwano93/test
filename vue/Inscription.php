<?php
    if (array_key_exists("erreur",$_GET)){
        echo "if y a une erreur.";
        if ($_GET["erreur"] == 0){
            echo "email deja utilisé";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<form action="../src/controleur/TraitementUtilisateur.php" method="post">

    Nom :
    <input type="text" name="nom"/><br>

    Prenom :

    <input type="text" name="prenom"/><br>

    Age :

    <input type="date" name="age"/><br>

    Email :

    <input type="email" name="email"/><br>

    mdp :

    <input type="password" name="mdp"/><br>


    <input type="submit" name="inscription"/><br>

</form>

</body>
</html>