<?php

use App\Routing\AbstractRouter;
use App\Routing\HomeRouter;

require __DIR__ . '/../includes.php';
session_start();

$page = isset($_GET['c']) ? AbstractRouter::secured($_GET['c']) : 'home';
$action = isset($_GET['a']) ? AbstractRouter::secured($_GET['a']) : 'index';

switch ($page) {
    case 'home':
        HomeRouter::route();
        break;
    default:
        (new ErrorController())->error404($page);
}