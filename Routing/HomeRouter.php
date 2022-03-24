<?php

namespace App\Routing;

class HomeRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        (new \HomeController())->index();
    }
}