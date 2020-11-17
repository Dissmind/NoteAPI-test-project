<?php


class Session {
    public $id;
    public $token;
    public $time;


    function __construct($token, $time) {
        $this->token = $token;
        $this->time = $time;
    }
}