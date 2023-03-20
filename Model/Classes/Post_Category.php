<?php
class Post_Category {

    private $idpost_category;
    private $id_post;
    private $id_category;

    public function getIdPostCategory() {
        return $this->idpost_category;
    }

    public function getIdPost() {
        return $this->id_post;
    }
    public function setIdPost($id_post) {
        $this->id_post = $id_post;
    }

    public function getIdCategory() {
        return $this->id_category;
    }
    public function setIdCategory($id_category) {
        $this->id_category = $id_category;
    }
}