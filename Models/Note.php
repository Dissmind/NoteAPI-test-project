<?php


class Note {
    public $id = null;
    public $title = null;
    public $content = null;

    function __construct($id, $title, $content) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }
}