<?php
session_start();
require_once 'Model/managers/PostManagers.php';
require_once 'Model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

if(isset($_SESSION['user'])){
    if(isset($_POST)&&!empty($_POST)){
        $cat_name = $_POST['name'];
        CategoryManager::addCategory($cat_name);
    }
    require_once 'Views/addcategoryView.php';

} else {
    header('location:login.php?status=danger&message=Vous devez être connecté pour ajouter une catégorie');
}