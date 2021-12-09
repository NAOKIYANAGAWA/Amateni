<?php
namespace db;

use db\DataSource;
use model\UserModel;

class UserQuery
{
    public static function fetchByEmail($email)
    {
        $db = new DataSource;
        $sql = 'select * from users where email = :email;';

        $result = $db->selectOne($sql, [
            ':email' => $email
        ], DataSource::CLS, UserModel::class);

        return $result;
    }

    public static function fetchById($id)
    {
        $db = new DataSource;
        $sql = 'select * from users where id = :id;';

        $result = $db->selectOne($sql, [
            ':id' => $id
        ], DataSource::CLS, UserModel::class);

        return $result;
    }

    public static function insert($user)
    {
        $db = new DataSource;
        $sql = 'insert into users(email, pwd, nickname, registered) values (:email, :pwd, :nickname, now())';

        $user->pwd = password_hash($user->pwd, PASSWORD_DEFAULT);

        return $db->execute($sql, [
            ':email' => $user->email,
            ':pwd' => $user->pwd,
            ':nickname' => $user->nickname,
        ]);
    }

    public static function update($user, $db)
    {
        // if (!(
        //     $user->isValidUserId()
        //     * $user->isValidLevelParam()
        // )) {
        //     return false;
        // }

        $sql = 'update users set
                nickname = :nickname,
                level = :level
                where id = :id';

        return $db->execute($sql, [
            ':nickname' => $user->nickname,
            ':level' => $user->level,
            ':id' => $user->id,
        ]);
    }
}
