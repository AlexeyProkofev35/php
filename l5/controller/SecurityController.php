<?php
require_once 'model/UserProvider.php';

session_start();

$error = null;

//действие разлогиниться

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    unset($_SESSION['tasks']);
    header("Lokation: index.php");
    die();
}

if (isset($_SESSION['user'])){
    header('Location: /');
}

$error = null;
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider();
    $user = UserProvider::getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    }else{
        $_SESSION['user'] = $user;
        header("Location: index.php");
        die();
    }
}


require_once 'view/signin.php';
