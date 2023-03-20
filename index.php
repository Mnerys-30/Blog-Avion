<?php
session_start();

// on va chercher les managers pour utiliser les fonctions
require_once 'Model/managers/PostManager.php';
require_once 'Model/managers/CategoryManager.php';
require_once 'Model/managers/CommentManager.php';


// Ici on place toute la logique du code
// pour le menu nous avons besoin des catégories
$categories = CategoryManager::getAllCategories();

// tous les articles sont disponibles dans la page d'accueil
$posts = PostManager::getAllPosts();


// requerir le fichier Views
require_once 'Views/indexView.php';
