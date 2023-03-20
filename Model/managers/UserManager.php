<?php

require_once './Model/DBConnect.php';
require_once './Model/Classes/User.php';


class UserManager { 

public static function getUserInfos($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM user WHERE iduser = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $user = $stmt->fetch();
    return $user;
}

public static function getAuthorByPostId($id){
    $dbh = dbconnect();
    $query = "SELECT user.iduser, pseudo, email FROM user JOIN post ON post.id_user = user.iduser WHERE post.idpost = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $user = $stmt->fetch();
    return $user;
}

public static function getCommentAuthorByCommentId($id){
    $dbh = dbconnect();
    $query = "SELECT user.iduser, pseudo, email FROM comment JOIN user ON coment.id_user = user.iduser WHERE comment.idcomment = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $user = $stmt->fetch();
    return $user;
}

public static function addUser($pseudo, $email, $password){
    $dbh = dbconnect();
    $query = "INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    
}

public static function getUserByEmail($email){
    $dbh = dbconnect();
    $query = "SELECT * FROM user WHERE user.email = :email";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $user = $stmt->fetch();
    return $user;
}

public static function connectUser($user){
 //   session_start();
    $_SESSION['user'] = [
        'id'=>$user->getIdUser(),
        'pseudo'=>$user->getPseudo(),
    ];
}
}
