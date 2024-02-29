<?php

include '../bdd/Bdd.php';
include '../../src/model/Utilisateur.php';

var_dump($_POST);

if (array_key_exists('connexion', $_POST)){
    $user = new Utilisateur([
        "email" =>$_POST['email'],
        "mdp" =>$_POST['mdp'],
    ]);
    $user->connexion();
}else if (array_key_exists('inscription', $_POST)){
    $user = new Utilisateur([
        "nom" =>$_POST['nom'],
        "prenom" =>$_POST['prenom'],
        "date" =>$_POST['age'],
        "email" =>$_POST['email'],
        "mdp" =>$_POST['mdp'],
    ]);
    
    $user->inscription();    
}else if (array_key_exists('supprimer', $_POST)){
    $user = new Utilisateur([
        "idUser" =>$_POST['id_user'],
    ]);
    $user->supprimer();
}else if (array_key_exists('editer', $_POST)){
    $user = new Utilisateur([
        "idUser" =>$_POST['id_user'],
        "nom" =>$_POST['nom'],
        "prenom" =>$_POST['prenom'],
        "date" =>$_POST['age'],
        "email" =>$_POST['email'],
    ]);
    $user->editer();
}else if (array_key_exists('deconnexion', $_POST)){
    session_start();
    session_destroy();
    header('Location: ../../vue/connexion.php');
}