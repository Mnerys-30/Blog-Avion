<?php

session_start();

require_once 'Model/managers/PostManager.php';
require_once 'Model/managers/CategoryManager.php';
require_once 'Model/managers/CommentManager.php';
require_once 'Model/managers/UserManager.php';

//vérification de l'existence de l'id 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; // placé dans une variable pour plus de facilité d'utilisation par la suite
    // on va chercher les informations que l'on souhaite afficher
    $post = PostManager::getPostById($id);// info article
    if(!$post){//si id ne correspond pas à un article dirige vers pasge d'erreur
        header('location:404.php');
    }
    $postCategories = CategoryManager::getCategoriesByPostId($id);//catégorie auquel il est relié
    $author = UserManager::getAuthorByPostId($id);
    $comments = CommentManager::getCommentsByPostId($id);
} else {// si on ne reçoit pas d'id depuis l'url, on redirige vers la page d'erreur
    header('location:404.php');
}
// formulaire de commentaire 
 
    if(isset($_POST)&& !empty($_POST)) {
        $content = $_POST['content'];
        $userId = $_SESSION['user']['id'];
        $postId = $_GET['id'];
        CommentManager::addComment($postId, $userId, $content);
    } //header("location:single.php?id=$postId&status=success&message=Votre commentaire a bien été ajouté";)      

//toutes les catégories pour le menu de navigation
$categories = CategoryManager::getAllCategories();


require_once 'Views/singleViews.php';