<?php

namespace App\Routing;

use HomeController;

class HomeRouter extends AbstractRouter
{

    public static function route(?string $action = null)
    {
        (new HomeController())->index();
    }
}
