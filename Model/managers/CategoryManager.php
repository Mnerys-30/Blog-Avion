 
<?php

require_once './Model/DBConnect.php';
require_once './Model/Classes/Category.php';
require_once './Model/Classes/Post.php';

class CategoryManager {

    public static function getAllCategories(){
        $dbh = dbconnect();
        $query = "SELECT * FROM category";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $categories =$stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories;
    }

    public static function getCategoryInfos($id){
        $dbh = dbconnect();
        $query ="SELECT * FROM category where idcategory = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $category = $stmt->fetch();
        return $category;
    }

    public static function getCategoriesByPostId($id) {
        $dbh = dbconnect();
        $query = "SELECT category.idcategory, category_name FROM category JOIN post_category ON category.idcategory = post_category.id_category JOIN post ON
        post_category.id_post = post.idpost WHERE post.idpost = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories;
    }

        public static function addCategory($name) {
            $dbh = dbconnect();
            $query = "INSERT INTO category (category_name) VALUES (:name)";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        }
    
}
