<?php
require_once 'Model/DBConnect.php';
require_once 'pseudoUser.php';


if(isset($_POST) && !empty($_POST)){
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    
}   




?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<video class="video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="video\mylivewallpapers.com-Painted-Clouds.mp4" type="video/mp4">
</video>

<header class="bd-header bg-transparent py-3 d-flex align-items-stretch border-bottom border-dark">
        <div class="container-fluid d-flex align-items-center">
            <h1 class="d-flex align-items-center fs-4 text-dark mb-0">
                Inscrivez-vous
            </h1>
            <a href="index.php" class="btn btn-outline-info ms-auto link-dark">Retourner l'accueil</a>
        </div>
    </header>
<body>
    <form action="" method="POST" class="col-md-6 offset-md-3 mt-5">
        <div class="mb-3">
            <label for="inputPseudo" class="form-label">Pseudo de l'utilisateur</label>
            <input type="text" class="form-control" id="inputPseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email de l'utilisateur</label>
            <input type="email" class="form-control" id="inputEmail" name="email">
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password de l'utilisateur</label>
            <input type="text" class="form-control" id="inputPassword" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="create">S'enregistrer</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>