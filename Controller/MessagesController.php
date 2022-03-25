<?php

namespace App\Controller;

use App\Model\Entity\Messages;
use DateTime;

class MessagesController extends AbstractController
{
    public function index()
    {
        $this->render('user/chat');
    }

    public function addMessage()
    {
        if ($this->isFormSubmitted()) {
            $user = $_SESSION['user'];
            $content = $this->sanitizeString($this->getField('message'));

            $message = new Messages();
            $message
                ->setMessage($content)
                ->setSendDate(new DateTime())
                ->setAuthor($user)
                ;
        }
    }
}
