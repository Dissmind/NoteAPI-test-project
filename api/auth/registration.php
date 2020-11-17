<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config.php';
include_once SITE_ROOT.'\Models\User.php';
include_once  SITE_ROOT.'\auth\Registration.php';


if (isSet($_GET['login']) && isSet($_GET['password'])) {

    $reg = new Registration();


    $login = $_GET['login'];
    $password = $_GET['password'];

    $user = new User($login, $password);
//    $reg->addUser($user);
//    echo json_encode($user);

    echo json_encode(['token' => gen_token()]);
} else {
    echo json_encode(['status' => 'bad']);
}


