<?php

session_start();

require_once 'Model/managers/PostManager.php';
require_once 'Model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

if(isset($_SESSION['user'])){

    if(isset($_POST)&&!empty($_POST)){
        $title= $_POST['title'];
        //$picture = $_POST['picture']; depuis enctype="multipart/form-data" les données de l'image sont reprises par $_FILES.
        // uptloader un fichier
        $uploads_dir = 'pictures';
        $tmp_location = $_FILES['picture']['tmp_name'];
        $random_string = uniqid();//génération d'une chaine de caractères aléatoires basé sur l'heure
        $picture = $random_string.'-'.$_FILES['picture']['name'];//génération d'un nouveau nom 
        move_uploaded_file($tmp_location, "$uploads_dir/$picture");//déplacement du fichier temporaire vers le serveur       
        $content = $_POST['content'];
        $userId = $_SESSION['user']['id'];
        $newPostId = PostManager::addPost($title, $picture, $content, $userId);
    // on devrait faire un track catch pour vérifier la bonne implantation. Si il y a un problème 
    // il faudra le signaler à l'utilisateur
        $postCategories = $_POST['categories']; /*$_POST['categories'] nous donne un tableau des catégories sélectionnées
        il suffit donc de boucler sur ce tableau et pour chaque ligne insérer
        dans la table de liaison l'id de l'article ($newPost) et l'id de la catégorie*/
    foreach($postCategories as $cat){
        PostManager::addPostCategories($newPostId, $cat);
    }
    
    

    }


    require_once 'Views/addpostView.php';

}else{
   header('location:login.php?status=danger&message=Vous devez être connecté pour ajouter un article');
}