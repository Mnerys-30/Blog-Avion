<?php
session_start();

// page catégorie doit recevoir l'id de la catégorie pour afficher les bonnes infos
require_once 'Model/managers/CategoryManager.php';
require_once 'Model/managers/PostManager.php';

if (isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $categoryInfos = CategoryManager::getCategoryInfos($id);
    if(!$categoryInfos){// si di est différente
        header('location:404.php');
    }
   
    $categoryPosts = PostManager::getPostsByCategoryId($id);
} else {// absence d'id
    header('location:404.php');
}
$categories = CategoryManager::getAllCategories();

require_once 'views/categoryView.php';