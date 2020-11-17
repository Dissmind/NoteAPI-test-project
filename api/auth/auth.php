<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config.php';
include_once SITE_ROOT.'\Models\User.php';
include_once  SITE_ROOT.'\auth\Auth.php';




$login = '';
$password = '';

$user = new User($login, $password);

$auth = new Auth();
$result = $auth->signIn($user);

echo json_encode($result);