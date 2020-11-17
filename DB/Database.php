<?php

include_once 'DBConfig.php';



class Database extends DBConfig {
    private $connect = null;

    public function getConnection() {
        $this->connect = mysqli_connect($this->host, $this->user, $this->password, $this->db)
            or die("Ошибка" . mysqli_error($this->connect));

        return $this->connect;
    }


    public function closeConnection() {
        mysqli_close($this->connect);
    }
}