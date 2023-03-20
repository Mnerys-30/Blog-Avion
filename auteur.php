<?php
session_start();
require_once 'Model/managers/CategoryManager.php';
require_once 'Model/managers/UserManager.php';
require_once 'Model/managers/PostManager.php';

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $userInfos = UserManager::getUserInfos($id);
    if(!$userInfos){// si id différente de l'utilisateur afficher message d'erreur
        header('location:404.php');
    }
    $userPosts = PostManager::getPostByUserId($id);
} else { // si pas d'id page d'erreur
    header('location:404.php');
}

$categories = CategoryManager::getAllCategories();

require_once 'Views/auteurViews.php';