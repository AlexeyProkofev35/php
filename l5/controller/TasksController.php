<?php
include_once "model/Task.php";
include_once "model/TaskProvider.php";
include_once "model/User.php";


session_start();

$pageHeader = "Задачи";

//Получаем текущего пользователя если он залогинен

$username = null;



if (isset($_SESSION['user']))  {
    $username = $_SESSION['user']->getUsername();
} else {
    //Перенаправляем на главную если пользователь не залогинен
    header("Location: /");
    die();
}
$taskPrivider = new TaskProvider();
var_dump($_SESSION ?? null);

//Сделаем метод добавления новой задачи и сохранения ее в сессии


if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskText = strip_tags($_POST['task']);
    $taskProvider->addTask(new Task($taskText));
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];
    $taskProvider->deleteTask($key);
    header("Location: /?controller=tasks");
    die();
}
$tasks = $taskPrivider->getUndoneList();
include 'view/tasks.php';
