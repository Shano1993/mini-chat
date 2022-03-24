<?php

namespace App\Controller;

use App\Model\Entity\Users;

abstract class AbstractController
{
    abstract public function index();

    public function render(string $template, array $data = [])
    {
        ob_start();
        require __DIR__ . '/../View/' . $template . '.html.php';
        $html = ob_get_clean();
        require __DIR__ . '/../View/base.html.php';
    }

    /**
     * @param string $field
     * @param null $default
     * @return mixed|string
     */
    public function getField(string $field, $default = null)
    {
        if (!isset($_POST[$field])) {
            return (null === $default) ? '' : $default;
        }
        return $_POST[$field];
    }

    /**
     * @return bool
     */
    public function isFormSubmitted(): bool
    {
        return isset($_POST['save']);
    }

    /**
     * @param string $param
     * @return string
     */
    public function sanitizeString(string $param): string
    {
        return filter_var($param, FILTER_SANITIZE_STRING);
    }

    /**
     * @return bool
     */
    public static function isUserConnected(): bool
    {
        return isset($_SESSION['user']) && null !== ($_SESSION['user'])->getId();
    }

    public function redirectIfConnected(): void
    {
        if (self::isUserConnected()) {
            $this->render('home/index');
        }
    }

    public function getConnectedUser(): ?Users
    {
        if (!self::isUserConnected()) {
            return null;
        }
        return ($_SESSION['user']);
    }
}
