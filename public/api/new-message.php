<?php

use App\Model\Entity\Messages;
use App\Model\Manager\MessagesManager;

require __DIR__ . '/../../Config.php';
require __DIR__ . '/../../Model/DB.php';
require __DIR__ . '/../../Model/Entity/AbstractEntity.php';
require __DIR__ . '/../../Model/Entity/Messages.php';
require __DIR__ . '/../../Model/Entity/Users.php';
require __DIR__ . '/../../Model/Manager/MessagesManager.php';

session_start();

$payload = file_get_contents('php://input');
$payload = json_decode($payload);

if (empty($payload->message)) {
    http_response_code(400);
    exit();
}

if (!isset($_SESSION['user'])) {
    http_response_code(403);
    exit();
}

$content = trim(strip_tags(htmlentities($payload->message)));

$format = 'Y-m-d H:i:s';

$message = new Messages();
$message->setMessage($content);
$message->setSendDate(new DateTime());
$message->setAuthor($_SESSION['user']);

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