<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `user` ');
$req->execute(array());
$res = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
<a href="../src/controleur/TraitementUtilisateur.php">Deconnexion</a>
<table>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date</th>
        <th>Email</th>
        <th>action</th>
    </tr>
    <?php
        foreach ($res as $user){
            ?>
        <tr>
            <td><?=$user["id_user"] ?></td>
            <td><?=$user["nom"] ?></td>
            <td><?=$user["prenom"]?></td>
            <td><?=$user["email"]?></td>
            <td><?=$user["age"]?></td>
            <td><a href="edition.php?id_user=<?=$user["id_user"]?>">Editer</a>
                / <a href="supprimer.php?id_user=<?=$user["id_user"]?>">Supprimer</a></td>
        </tr>

            <?php
        }
    ?>
</table>
</body>
</html>