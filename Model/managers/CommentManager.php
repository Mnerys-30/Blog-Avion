<?php
require_once './Model/DBConnect.php';
require_once './Model/Classes/Comment.php';

class CommentManager {

       public static function getCommentsByPostId($id) {
        $dbh = dbconnect();
        $query = "SELECT * FROM comment WHERE comment.id_post = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;
    }

   
    public static function addComment($postId, $userId, $content){
        $dbh = dbconnect();
        $date =(new DateTime())->format('Y-m-d H:i:s');
        $query = "INSERT INTO comment (id_post, id_user, date, content) VALUES (:idpost, :iduser, '$date', :content)";
        $stmt =$dbh->prepare($query);
        $stmt->bindParam(':idpost', $postId);
        $stmt->bindParam(':iduser', $userId);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        return $dbh->lastInsertId();
    }
public static function deleteCommentByPostId($id){
    $dbh = dbconnect();
    $query = "DELETE FROM comment WHERE comment.id_post = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    }
}