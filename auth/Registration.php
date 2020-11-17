<?php

include_once __DIR__.'/../config.php';
require_once SITE_ROOT.'\DB\Database.php';
require_once SITE_ROOT.'\Models\User.php';


class Registration {

    public function addUser(User $user) {
        $db = new Database();
        $connection = $db->getConnection();

        $query = "INSERT INTO users (id, login, password) VALUES (null,'"
            . $user->login
            . "', '"
            . "$user->password"
            . "')";

        $result = mysqli_query($connection, $query);
    }

}