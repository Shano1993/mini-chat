<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Messages;
use DateTime;

class MessagesManager
{
    public const TABLE = 'messages';

    /**
     * @param Messages $message
     * @return bool
     */
    public static function newMessage(Messages &$message): bool
    {
        $stmt = DB::getPDO()->prepare("
            INSERT INTO " . self::TABLE . " (message, users_fk) VALUES (:message, :author)
        ");
        $stmt->bindValue(':message', $message->getMessage());
        $stmt->bindValue(':author', $message->getAuthor()->getId());

        $result = $stmt->execute();
        $message->setId(DB::getPDO()->lastInsertId());
        return $result;
    }

    /**
     * @return array
     */
    public static function getAllMessages(): array
    {
        $messages = [];
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE);
        if ($request) {
            $usersManager = new UsersManager();
            $format = 'Y-m-d H:i:s';

            foreach ($request->fetchAll() as $messageData) {
                $messages[] = (new Messages())
                    ->setId($messageData['id'])
                    ->setMessage($messageData['message'])
                    ->setSendDate(DateTime::createFromFormat($format, $messageData['date']))
                    ->setAuthor($usersManager->getUserById($messageData['users_fk']))
                    ;
            }
        }
        return $messages;
    }
}