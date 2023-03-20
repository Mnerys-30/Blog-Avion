<?php
session_start();
require_once 'Model/managers/PostManager.php';
require_once 'Model/managers/UserManager.php';
require_once 'Model/managers/CategoryManager.php';
// controle avec un var_dump($_SESSION['user']);
//verification que l'on reçoit bien une id.
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $author = UserManager::getAuthorByPostId($id);
    // var_dump($author->getIdUser());
    // vérification que l'utilisateur est bien l'auteur
    if($author->getIdUser()!==$_SESSION['user']['id']) {
        header("location:index.php?status=danger&message=Vous n'avez pas l'autorisation de faire cette action!");
    die; //ejection du script
    }
    // récupération des données pour envoyer dans la vue
    $post = PostManager::getPostById($id);
    $post_categories = CategoryManager::getCategoriesByPostId($id);
}
    // traitement des données 

    if(isset($_POST)&&!empty($_POST)) {
        $title = $_POST['title'];
        // ATTENTION tratement particulier pour les images
        if(isset($_FILES['picture']['name'])&&!empty($_Files['picture']['name'])){
            $uploads_dir = '/Pictures';
            $tmp_location = $_FILES['picture']['tmp_name'];
            $random_string = uniqid();//chaine de caractère basée sur l'heure pour être unique
            $picture = $random_string.'-'.$_FILES['picture']['name'];
            move_uploaded_file($tmp_location, "$uploads_dir/$picture");
        } else {
            //pour ne pas redonner à $picture la valeur qu'elle a déjà en bdd
            $picture = $post->getPicture();
        }
        $content = $_POST['content'];
        $userId = $_SESSION['user']['id'];
        // on appelle une fonction pour uplaoder
        PostManager::editPost($id, $title, $picture, $content, $userId);
        // on supprime les catégories déjà en bdd pour l'article
        PostManager::deletePostCategoriesByPostId($id);
        // on enregistre la nouvelle
        $postCategories = $_POST['categories'];
        foreach($postCategories as $cat);
        PostManager::addPostCategories($id, $cat);
        }
        header("location:single.php?=$id&status=success&message=L'artcile a bien été mis à jour !");
    

    $categories = CategoryManager::getAllCategories();

    require_once 'Views/editpostViews.php';