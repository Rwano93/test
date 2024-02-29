<?php
include '../src/bdd/Bdd.php';

$bdd = new bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `user` WHERE id_user=:id_user');
$req->execute(array(
    "id_user" =>$_GET["id_user"]
));
$res = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edition d'un profil</title>
</head>
<body>
<form action="../src/controleur/TraitementUtilisateur.php" method="post">

    Nom :
    <input type="text" name="nom" value="<?=$res["nom"]?>"/><br>

    Prenom :
    <input type="text" name="prenom" value="<?=$res["prenom"]?>"/><br>

    Age :
    <input type="date" name="age" value="<?=$res["age"]?>"/><br>

    Email :

    <input type="email" name="email" value="<?=$res["email"]?>"/><br>

    <input type="hidden" name="id_user" value="<?=$res["id_user"]?>"/><br>
    <input type="submit" name="editer"/><br>

</form>

</body>
</html>