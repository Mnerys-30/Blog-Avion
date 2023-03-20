<?php
require_once 'Partials/header.php';
?>
    <video class="video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="video\mylivewallpapers.com-Painted-Clouds.mp4" type="video/mp4">
    </video>

<h1 class="text-center mt-5">Ajouter un article</h1>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="inputTitre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="inputTitre" name="title">
        </div>
        <div class="mb-3">
            <label for="inputPicture" class="form-label">Image</label>
            <input type="file" class="form-control" id="inputPicture" name="picture">
        </div>
        <div class="mb-3">
            <label for="inputContent" class="form-label">Contenu</label>
            <textarea class="form-control" id="inputContent" name="content"></textarea>
        </div>
            <?php foreach($categories as $category){ ?>
        <div class="form-check">
             <input class="form-check-input" type="checkbox" name="categories[]" value="<?php echo $category->getIdCategory() ?>" id="<?php echo $category->getCategoryName() ?>">
             <label class="form-check-label" for="<?php echo $category->getCategoryName() ?>">
                <?php echo $category->getCategoryName() ?>
                
             </label>
        </div>
        <?php } ?>
        <div class="mb-3">
            
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="create">Soumettre l'article</button>
</div>
    </form>




<?php
require_once 'Partials/footer.php';
?>