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
    public static function getAll(): array
    {
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE);
        $messages = [];

        if ($request) {
            $usersManager = new UsersManager();
            foreach ($request->fetchAll() as $value) {
                $messages[] = self::createMessage($value, $usersManager);
            }
        }
        return $messages;
    }

    /**
     * @param array $data
     * @param $userManager
     * @return Messages
     */
    public static function createMessage(array $data, $userManager): Messages
    {
        $format = "Y-m-d H:i:s";
        return (new Messages())
            ->setId($data['id'])
            ->setAuthor($userManager->getUserById($data['users_fk']))
            ->setSendDate(DateTime::createFromFormat($format, $data['date']))
            ->setMessage($data['message'])
            ;
    }
}