<?php

class Category {

    private $idcategory;
    private $category_name;

    public function getIdCategory() {
        return $this->idcategory;
    }

    public function getCategoryName() {
        return $this->category_name;
    }
    public function setCategoryName($category_name) {
        $this->category_name = $category_name;
    }
}