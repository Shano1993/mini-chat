<?php

use App\Controller\AbstractController;
use App\Model\Entity\Users;
use App\Model\Manager\UsersManager;

class UsersController extends AbstractController
{
    public function index()
    {
        $this->render('user/register');
    }

    public function register()
    {
        if ($this->isFormSubmitted()) {
            $errors = [];
            $email = filter_var($this->getField('email'), FILTER_VALIDATE_EMAIL);
            $password = $this->getField('password');
            $passwordRepeat = $this->getField('password-repeat');
            $username = $this->sanitizeString($this->getField('username'));

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'adresse email n'est pas dans un format correct.";
            }

            if ($password !== $passwordRepeat) {
                $errors[] = "Les mots de passe ne correspondent pas.";
            }

            if (!preg_match('/^(?=.*[!@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                $errors[] = "Le mot de passe doit contenir une majuscule, un chiffre et un caractère spécial.";
            }

            if (count($errors) > 0 ) {
                $_SESSION['errors'] = $errors;
            }

            else {
                $user = new Users();
                $user
                    ->setEmail($email)
                    ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                    ->setUsername($username)
                    ;
                if (!UsersManager::mailUserExist($user->getEmail())) {
                    UsersManager::addUser($user);
                    if (null !== $user->getId()) {
                        $_SESSION['success'] = "Inscription réussie !";
                        $user->setPassword('');
                        $_SESSION['user'] = $user;
                    }
                    else {
                        $_SESSION['errors'] = "Impossible de vous enregistrer.";
                    }
                }
                else {
                    $_SESSION['errors'] = "L'adresse email est déjà utilisée !";
                }
            }
        }
        $this->render('user/register');
    }
}
