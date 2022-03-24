<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Users;

class UsersManager
{
    public const TABLE = 'users';

    /**
     * @param string $email
     * @return bool
     */
    public static function mailUserExist(string $email): bool
    {
        $result = DB::getPDO()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE email = '".$email."'");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function userExist(int $id): bool
    {
        $result = DB::getPDO()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * @param Users $user
     * @return bool
     */
    public static function addUser(Users &$user): bool
    {
        $stmt = DB::getPDO()->prepare("
            INSERT INTO " . self::TABLE . " (email, password, username)
            VALUES (:email, :password, :username)
        ");
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':username', $user->getUsername());

        $result = $stmt->execute();
        $user->setId(DB::getPDO()->lastInsertId());

        return $result;
    }
}
