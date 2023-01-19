<?php

declare(strict_types=1);

use MDZT\MVC\Controller\{
    Controller,
    DeleteVideoController,
    EditVideoController,
    NewVideoController,
    FormVideoController,
    VideoListController,
    Error404Controller,
};
use \MDZT\MVC\Repository\VideoRepository;
require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../src/Data/db.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];
$key = "$httpMethod|$pathInfo";

if(array_key_exists($key, $routes)){
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($videoRepository);
} else {
    $controller = new Error404Controller();
}

$controller->processRequest();
?>