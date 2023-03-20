
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">   
<title>blog</title>
</head>
<body>
    <header class="bd-header bg-transparent py-3 d-flex align-items-stretch border-bottom border-none">
        <div class="container-fluid d-flex align-items-center">
            <h1 class="d-flex align-items-center fs-4 text-dark mb-0 px-5">
                Blog Anti-Vol
            </h1>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-info link-dark dropdown-toggle px-5" data-bs-toggle="dropdown" aria-expanded="false">
                 Catégories
                </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="category.php">Chasseur</a></li>
                        <li><a class="dropdown-item" href="category.php">Bombardier</a></li>
                     </ul>
            </div>
            <a href="index.php" class="btn btn-outline-info ms-auto link-dark px-5">Accueil</a>
            <a href="signin.php" class="btn btn-outline-info ms-auto link-dark px-5">S'inscrire</a>
            <?php 
            if(isset($_SESSION['user'])&& !empty($_SESSION['user'])){?>
             <a href="addpost.php" class="btn btn-outline-info ms-auto link-dark px-5">Ajouter un article</a>
            <?php } ?>
            <?php 
            if(isset($_SESSION['user'])&& !empty($_SESSION['user'])){?>
             <a href="logout.php" class="btn btn-outline-info ms-auto link-dark px-5">Se déconnecter</a>
            <?php } else { ?>
            <a href="login.php" class="btn btn-outline-info ms-auto link-dark px-5">Se connecter</a> 
            <?php } ?>
            
            
            
        </div>
    </header>


