<?php
/* @var $pdo PDO */
$pdo = require_once 'db.php';
require_once 'model/User.php';
require_once 'model/UserProvider.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';

$pdo->exec('DROP TABLE IF EXISTS users');

$pdo->exec('CREATE TABLE users (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
name VARCHAR(150),
username VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL
)');


$userProvider = new UserProvider($pdo);

$user = new User('geekbrains');
$user->setName('GeekBrains PHP');
$userProvider->registerUser($user, 'password123');


$pdo->exec('DROP TABLE IF EXISTS tasks');

$pdo->exec('CREATE TABLE tasks (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
user_id INTEGER NOT NULL,
description VARCHAR(150),
isDone tinyint(1) NOT NULL
)');

