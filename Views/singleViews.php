<?php
require_once 'Partials/header.php';
?>

<video class="video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="video\mylivewallpapers.com-Painted-Clouds.mp4" type="video/mp4">
</video>

<section id="hero">
    <img src="pictures/<?php echo $post->getPicture() ?>"
        class="container d-flex flex-column justify-content-center align-items-center p-5" alt="">

</section>

<section id="main" class="container d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-center"><?php echo $post->getTitle() ?></h1>
    <div id="categories">
        <?php foreach($postCategories as $postCategory){?>
        <span class="badge rouded-pill text-bg-primary"><?php echo $postCategory->getCategoryName() ?></span>
        <?php }  ?>
    </div>
    <br>
    <div class="block">
        <p><?php echo $post->getContent() ?></p>
    </div>
</section>
<!-- formulaire de commentaire -->

<?php

if(isset($_SESSION['user'])&& !empty($_SESSION['user'])) { ?>

<h1 class="text-center mt-5">Ajouter un commentaire</h1>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="inputContent" class="form-label">Contenu</label>
            <textarea class="form-control" id="inputContent" name="content"></textarea>
            <input id="pseudo" type="hidden" value="<?php echo $_SESSION['user'] ['pseudo'] ?>" :">
        </div>
    </form>
</div>

<?php }?>

<?php
require_once 'partials/footer.php';

?>