<?php

class Comment {

    private $idcomment;
    private $date;
    private $content;
    private $id_user;
    private $id_post;

    public function getIdComment() {
        return $this->idcomment;
    }

    public function getDate() {
        return $this->date;
    }
    public function setDate($date) {
         $this->date = $date;
    }

    public function getContent() {
        return $this->content;
    }
    public function setContent($content) {
         $this->content = $content;
    }

    public function getIdUser() {
        return $this->id_user;
    }
    public function setIdUser($id) {
        $this->id_user = $id;
    }

    public function getIdPost() {
        return $this->id_post;
    }
    public function setIdPost($id) {//que l'id
        $this->id_post = $id;
    }

}