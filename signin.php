<?php
session_start();

require_once 'Model/DBConnect.php';
require_once 'pseudoUser.php';
require_once 'Views/signinViews.php';
require_once 'Model/managers/CategoryManager.php';

//reception des données du formulaire
if(isset($_POST)&&!empty($_POST)){
    //sanitisation des données et chiffrement du mot de passe
    $pseudo = htmlentities($_POST['pseudo']);
    $email = htmlentities($_POST['email']);
    $mdp = $_POST['password'];
    $hashed_pwd = password_hash($mdp, PASSWORD_BCRYPT);
    //transmission à une méthode du manager pour enregistrer en bdd 
    UserManager::addUser($pseudo, $email, $hashed_pwd);
    //UserManager::connectUser(); à construire
}

$categories = CategoryManager::getAllCategories();

   

?>