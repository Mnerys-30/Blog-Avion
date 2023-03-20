<?php
session_start();
require_once 'Model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

require_once 'views/404View.php';