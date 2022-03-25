<?php

namespace App\Controller\API;

use App\Controller\AbstractController;
use App\Model\Entity\Messages;
use App\Model\Manager\MessagesManager;
use DateTime;

class MessagesController extends AbstractController
{
    public function index()
    {
        $this->render('user/chat');
    }

    public function newMessage()
    {
        $payload = file_get_contents('php://input');
        $payload = json_decode($payload);

        if (empty($payload->message)) {
            http_response_code(400);
            exit();
        }

        if (!self::isUserConnected()) {
            http_response_code(403);
            exit();
        }

        $content = $this->sanitizeString($payload->message);
        $user = $_SESSION['user'];

        $message = new Messages();
        $message->setMessage($content);
        $message->setSendDate(new DateTime());
        $message->setAuthor($user);

        if (MessagesManager::newMessage($message)) {
            echo json_encode([
                'id' => $message->getId(),
                'message' => $message->getMessage(),
                'date' => $message->getSendDate(),
                'author' => $message->getAuthor()->getUsername(),
            ]);
            http_response_code(200);
            exit();
        }
        http_response_code(200);
        exit();
    }
}