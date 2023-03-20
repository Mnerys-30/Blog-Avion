<?php
require_once 'Partials/header.php';
?>

<video class="video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="video\mylivewallpapers.com-Painted-Clouds.mp4" type="video/mp4">
</video>

<h1 class="text-center mt-5">Ajouter une catégorie</h1>

<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="InputName" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control" id="InputName" name="name">
        </div>
        <button class="btn btn-primary mt-3" type="submit">Ajouter la catégorie</button>
    </form>
</div>

<?php
require_once 'Partials/footer.php';
?>