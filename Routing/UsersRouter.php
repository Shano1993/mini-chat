<?php

namespace App\Routing;

use ErrorController;
use UsersController;

class UsersRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $controller = new UsersController();
        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'register':
                $controller->register();
                break;
            case 'logout':
                $controller->logout();
                break;
            case 'login':
                $controller->login();
                break;
            case 'chat':
                $controller->chat();
                break;
            default:
                (new ErrorController())->error404($action);
        }
    }
}