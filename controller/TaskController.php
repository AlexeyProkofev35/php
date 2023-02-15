<?php
/* @var $pdo PDO */

$taskProvider = new TaskProvider($pdo);

if (isset($_GET['action'])) {

    if ($_GET['action'] === 'add' && isset($_POST['description']) && !empty($_POST['description'])) {
        $task = new Task();
        $task->setDescription($_POST['description']);
        $taskProvider->addTask($task);
    }
    if ($_GET['action'] === 'setDone' && isset($_GET['id']) && !empty($_GET['id'])) {
        $taskProvider->setIsDone(intval($_GET['id']), 1);
    }
}

$tasks = $taskProvider->getUndoneList();
require_once 'view/task.php';

