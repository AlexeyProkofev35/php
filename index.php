<?php
/* @var $pdo PDO */
require_once 'model/User.php';
require_once 'model/UserProvider.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
$pdo = require_once 'db.php';

session_start();


$controller = $_GET['controller'] ?? 'home';
$routes = require 'routes.php';


require_once $routes[$controller];