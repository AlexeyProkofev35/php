<?php
/* @var $pdo PDO */

if (isset($_GET['action'])) {

    if ($_GET['action'] === 'logout') {
        unset($_SESSION['user']);
        header('Location: /');
    } elseif ($_GET['action'] === 'signin') {
        if (isset($_SESSION['user'])) {
            header('Location: /');
        } elseif (isset($_POST['username'], $_POST['password'])) {

            ['username' => $username, 'password' => $password] = $_POST;

            $userProvider = new UserProvider($pdo); // Передаем аргумент
            $user = $userProvider->getByUsernameAndPassword($username, $password);

            if (is_null($user)) {
                $error = 'Пользователь с указанными учетными данными не найден';
            } else {
                $_SESSION['user'] = $user;
                header('Location: /');
            }

        }
    }
}
require_once 'view/signin.php';

