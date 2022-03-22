<?php

namespace App\Routing;

abstract class AbstractRouter
{
    /**
     * @param string|null $action
     * @return mixed
     */
    abstract public static function route(?string $action = null);

    /**
     * @param string|null $param
     * @return string|null
     */
    public static function secured(?string $param): ?string
    {
        if (null === $param) {
            return null;
        }
        return strtolower(trim(strip_tags($param)));
    }
}
