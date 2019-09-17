<?php
use Src\Router\Router;
use Src\Models\Database;
$uri = trim($_SERVER["REQUEST_URI"], "/");

$root = __DIR__;
require $root . '/../src/Models/Database.php';




new Database();
Router::load($root . '/../src/Router/routes.php')->direct($uri);