<?php

$pageHeader = 'Добро пожаловать';
$username = isset($_REQUEST['username']) && !empty($_REQUEST['username']) ? $_REQUEST['username'] : null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    setcookie('username', null, -1);
} elseif (is_null($username) && isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}

if (isset($username)) {
    setcookie('username', $username, time() + 60 * 60 * 24);
}


//if (isset($_COOKIE['username'])) {
//    var_dump($_COOKIE);
//    die();
//}
require_once 'view/home.php';