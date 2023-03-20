<?php
session_start();
require_once 'Model/managers/PostManager.php';
require_once 'Model/managers/CommentManager.php';
require_once 'Model/managers/UserManager.php';

// vérification que l'on a bien une id de post à supprimer

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $author = UserManager::getAuthorByPostId($id);
    // vérification que l'utilisateur est l'auteur de l'article
    if($author->getIdUser() !=$_SESSION['user']['id']){
        header("location:index.php?statuts=danger&message=Vous n'avez pas l'autorisation d'effectuer cette manoeuvre.");
        die;// zou on se casse
    }
    // pour la suppression, les liens doivent être coupés
    // catégories, commentaires et post
    PostManager::deletePostCategoriesByPostId($id);
    CommentManager::deleteCommentByPostId($id);
    PostManager::deletePost($id);
    header("location:index.php?status=succes&message=L'article a bien été supprimé.");

}