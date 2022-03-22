<?php

class ErrorController
{
    /**
     * @param string $page
     */
    public function error404(string $page)
    {
        require __DIR__ . '/../View/error/error404.html.php';
    }
}