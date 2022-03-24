<?php

namespace App\Model\API;

use App\Controller\AbstractController;
use App\Model\Entity\Messages;
use App\Model\Manager\MessagesManager;
use DateTime;

class MessagesController extends AbstractController
{
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function sendMessage()
    {
        $payload = file_get_contents('php://input');
        $payload = json_decode($payload);

        if (empty($payload->message)) {
            http_response_code(400);
            exit();
        }

        if (!self::isUserConnected()) {
            http_response_code(403);
        }

        $messages = $this->sanitizeString($payload->message);

        $user = self::getConnectedUser();
        $message = new Messages();
        $message->setMessage($messages);
        $message->setAuthor($user);

        if (MessagesManager::newMessage($message)) {
            echo json_encode([
                'id' => $message->getId(),
                'message' => $message->getMessage(),
                'date' => $message->setSendDate(new DateTime()),
                'author' => $message->getAuthor()->getUsername(),
            ]);
            http_response_code(200);
            exit();
        }
        http_response_code(200);
        exit();
    }
}
