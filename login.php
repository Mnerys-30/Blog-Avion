<?php
session_start();

require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';

//reception des données du formulaire
if(isset($_POST)&&!empty($_POST)){
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    //récupération des données de l'utilisateur via une valeur unique telle que le mail
    $user = UserManager::getUserByEmail($email);
    //vérification de la correspondance du mdp en bdd avec celui saisi par l'utilisateur
    $verified_user = password_verify($mdp, $user->getPassword());
    
    if($verified_user){ 
        UserManager::connectUser($user);
        header('location:index.php?status=danger&message=Vous êtes bien connecté');
    } else {
        header('location:login.php?status=danger&message=email ou mot de passe incorrect');
    }
}

$categories = CategoryManager::getAllCategories();

require_once 'Views/loginViews.php';