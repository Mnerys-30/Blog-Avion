<?php
require_once 'Partials/header.php';
?>

<video class="video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="video\mylivewallpapers.com-Painted-Clouds.mp4" type="video/mp4">
</video>

<section id="homepage" class="pt-5">
    <h1 class="text-center mt-5">Bienvenue sur mon blog qui ne décolle pas !</h1>
    <div class="container mt-5 lg(top,)">
        <div class="row">
            <?php foreach($posts as $post){ ?>
            <div class="card col-12 col-md-4 col-lg-2 m-3 d-flex p-3">
                <img src="pictures/<?php echo $post->getPicture()?>" class="card-img-top" alt="Avion de guerre">
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="block f1">
                        <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
                        <p class="card-text">War Bird</p>
                        <a href="single.php?id=<?php echo $post->getIdPost()?>" class="btn btn-primary">Contact Moteur</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
// commentaire pour git

<?php
require_once 'Partials/footer.php';
?>