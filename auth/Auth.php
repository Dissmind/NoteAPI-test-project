<?php

include_once __DIR__.'/../config.php';

require_once SITE_ROOT.'\DB\Database.php';
require_once SITE_ROOT.'\Models\User.php';
require_once SITE_ROOT.'\Models\Session.php';


class Auth {



    public function signIn(User $user) {
        if (!$this->authentication($user)) {
            return ['error' => 'access is denied'];
        }

        $token = $this->generateToken();
        $session = new Session($token, 1);

        $db = new Database();
        $connection = $db->getConnection();

        $query = "INSERT INTO sessions (id, token, time) VALUES (null,'"
            . $session->token
            . "', '"
            . "$session->time"
            . "')";

        $result = mysqli_query($connection, $query);

        return ['token' => $this->generateToken()];
    }


    private function authentication(User $user) {
        // TODO
        return true;
    }


    private function generateToken() {
        $token = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );

        return $token;
    }
}