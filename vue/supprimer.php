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
    <title>Supprimer un profil</title>
</head>
<body>
<form action="../src/controleur/TraitementUtilisateur.php" method="post">
    Voulez-vous supprimer réellement le compte d'id <?=$_GET["id_user"]?> ?<br>
    <input type="hidden" name="id_user" value="<?=$_GET["id_user"]?>"/><br>

    <input type="submit" name="supprimer" value="Confirmer"/><br> <a href="accueil.php">Retour</a>

</form>

</body>
</html>