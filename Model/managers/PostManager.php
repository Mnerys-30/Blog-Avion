<?php
//le rôle du manager étant d'ineragir avec la bdd, c'est ici que l'on va récupérer le fichier qui contient la fonction correspondante
require_once './Model/DBConnect.php';
//nous allons transcire les données récupérrées sous la forme d'objets de la classe Post, nous devons donc inclure le fichier correspondant
require_once './Model/Classes/Post.php';


// généralement des méthodes statiques
class PostManager {
    //on va ensuite définir différentes méthodes très ciblées
    public static function getAllPosts() {//pour récupérer les articles
        $dbh = dbconnect();//on récupére notre projet PDO
        $query = ("SELECT * FROM post");//on écrit notre requête SQL
        $stmt = $dbh->prepare($query); //on prépare ici notre requête
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post'); //FECHT_CLASS précise la demande - renvoi une instance
        return $posts; // ne pas oublier de renvoyer la variable
    }

    public static function getPostById($id){
        $dbh = dbconnect();
        $query = ("SELECT * FROM post WHERE idpost = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $post = $stmt->fetch();
        return $post;
    }

    public static function getPostsByCategoryId($id){
        $dbh = dbconnect();
        $query = "SELECT * FROM post JOIN post_category ON post_category.id_post = post.idpost WHERE post_category.id_category = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function getPostByUserId($id) {
        $dbh = dbconnect();
        $query = "SELECT * FROM post JOIN user ON user.iduser = post.id_user WHERE user.iduser = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }   

    public static function addPost($title, $picture, $content, $userId){
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "INSERT INTO post (title, date, picture, content, id_user) VALUES (:title, '$date', :picture,  :content, :iduser)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':iduser', $userId);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function addPostCategories($id_post, $id_category){
        $dbh = dbconnect();
        $query = "INSERT INTO post_category (id_post, id_category) VALUE (:post, :cat)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':post', $id_post);
        $stmt->bindParam(':cat', $id_category);
        $stmt->execute();
    }

    
    public static function editPost($id, $title, $picture, $content, $userId){
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "UPDATE post SET title = :title, date = '$date', picture = :picture, content = :content, id_user = :id_user WHERE post.idpost = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id_user', $userId);
        $stmt->execute();

        // vérifier que le poste existe reçoit id 
        // récupérer les données du post pour les transmettre dans la vue
        // si on a des données en POST
        // appeler fonction UPDATE pour mettre à jour
        // ATTENTION - pour l'image - demande une image modifier à voir

    }

    public static function deletePostCategoriesByPostId($id) {
        $dbh = dbconnect();
        $query = "DELETE FROM post_category WHERE post.id_post = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id); // sécurisé un max
        $stmt->execute();

    }
    public static function deletePost($id){
        $dbh = dbconnect();
        $query = "DELETE FROM post WHERE post.idpost = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

//d'abord virer la categories avant de détruire le post donc faire une fonction pour cela avant
    }
}