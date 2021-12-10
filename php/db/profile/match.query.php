<?php

namespace db\profile;

use lib\Msg;
use db\DataSource;
use model\profile\MatchModel;
use model\UserModel;
use model\profile\match\ScoreModel;

class MatchQuery
{
    public static function fetchByUserId($user)
    {
        if (!$user->isValidEmail()) {
            return false;
        }

        $db = new DataSource;
        $sql = 'select * from matches where user_id = :id and del_flg != 1 order by id desc;';

        $result = $db->select($sql, [
            ':id' => $user->id
        ], DataSource::CLS, MatchModel::class);

        return $result;
    }

    public static function fetchByUserNickname($user_nickname)
    {
        $db = new DataSource;
        $sql = 'select * from users where nickname = :nickname and del_flg != 1;';

        $result = $db->select($sql, [
            ':nickname' => $user_nickname
        ], DataSource::CLS, UserModel::class);

        return $result;
    }

    public static function fetchAll()
    {
        $db = new DataSource;
        $sql = 'select * from matches where del_flg != 1;';

        $result = $db->select($sql, [], DataSource::CLS, MatchModel::class);

        return $result;
    }

    public static function fetchDistinctUsers()
    {
        $db = new DataSource;
        $sql = 'select distinct id, nickname from users where del_flg != 1;';

        $result = $db->select($sql, [], DataSource::CLS, MatchModel::class);

        return $result;
    }

    public static function joinUsers($user_id)
    {
        $db = new DataSource;
        $sql = '
        select
            m.*, u.nickname
        from matches m
        inner join users u
            on m.user_id = u.id
        where m.user_id = :id
            and m.del_flg != 1
            and u.del_flg != 1
        order by m.match_date desc
        ';

        $result = $db->select($sql, [':id' => $user_id], DataSource::CLS, MatchModel::class);

        return $result;
    }

    public static function fetchAllUsers()
    {
        $db = new DataSource;
        $sql = 'select id, nickname from users';

        $result = $db->select($sql);

        return $result;
    }

    public static function fetchAllScores($matchs)
    {
        $db = new DataSource;
        $sql = 'select * from scores';

        $scores = $db->select($sql, [], DataSource::CLS, ScoreModel::class);

        foreach ($matchs as $match) {
            foreach ($scores as $score) {
                if ($match->id === $score->match_id) {
                    $result[] = $score;
                }
            }
        }

        return $result;
    }

    public static function fetchMostRecentMatchByUserId($user_id)
    {
        $db = new DataSource;
        $sql = '
        select id from matches where user_id = :user_id order by match_date desc';

        $result = $db->selectOne($sql, [
            ':user_id' => $user_id
        ], DataSource::CLS, ScoreModel::class);

        if (empty($result)) {
            Msg::push(Msg::ERROR, '試合情報が見つかりませんでした。');
            return;
        }

        return $result;
    }

    public static function fetchScoreByMatchId($match_id)
    {
        $db = new DataSource;
        $sql = '
        select * from scores where match_id = :match_id';

        $result = $db->selectOne($sql, [
            ':match_id' => $match_id
        ], DataSource::CLS, ScoreModel::class);

        return $result;
    }

    public static function insert($match, $score, $user, $db)
    {
        if (!(
            $match->isValidMatchType()
            // * $match->isValidUserId()
            // * $match->isValidOpponentId()
            // * $match->isValidWinFlg()
        )) {
            return false;
        }

        $sql = 'insert into matches(
                    opponent_id,
                    prefecture_id,
                    city,
                    venue,
                    match_date,
                    match_type,
                    win_flg,
                    user_id
                ) values (
                    :opponent_id,
                    :prefecture_id,
                    :city,
                    :venue,
                    :match_date,
                    :match_type,
                    :win_flg,
                    :user_id
                )';

        $is_success = $db->execute($sql, [
            ':opponent_id' => $match->opponent_id,
            ':prefecture_id' => $match->prefecture_id,
            ':city' => $match->city,
            ':venue' => $match->venue,
            ':match_date' => $match->match_date,
            ':match_type' => $match->match_type,
            ':win_flg' => $match->win_flg,
            ':user_id' => $user->id,
        ], true);

        if ($is_success) {
            $sql = 'insert into scores(
                        match_id,
                        set_point_user,
                        set_point_opponent,
                        first_set_game_point_user,
                        first_set_game_point_opponent,
                        second_set_game_point_user,
                        second_set_game_point_opponent,
                        third_set_game_point_user,
                        third_set_game_point_opponent,
                        fourth_set_game_point_user,
                        fourth_set_game_point_opponent,
                        fifth_set_game_point_user,
                        fifth_set_game_point_opponent
                    ) values (
                        :match_id,
                        :set_point_user,
                        :set_point_opponent,
                        :first_set_game_point_user,
                        :first_set_game_point_opponent,
                        :second_set_game_point_user,
                        :second_set_game_point_opponent,
                        :third_set_game_point_user,
                        :third_set_game_point_opponent,
                        :fourth_set_game_point_user,
                        :fourth_set_game_point_opponent,
                        :fifth_set_game_point_user,
                        :fifth_set_game_point_opponent
                    )';

            return $db->execute($sql, [
                'match_id' => $db->get_lastInsertId(),
                'set_point_user' => $score->set_point_user,
                'set_point_opponent' => $score->set_point_opponent,
                'first_set_game_point_user' => $score->first_set_game_point_user,
                'first_set_game_point_opponent' => $score->first_set_game_point_opponent,
                'second_set_game_point_user' => $score->second_set_game_point_user,
                'second_set_game_point_opponent' => $score->second_set_game_point_opponent,
                'third_set_game_point_user' => $score->third_set_game_point_user,
                'third_set_game_point_opponent' => $score->third_set_game_point_opponent,
                'fourth_set_game_point_user' => $score->fourth_set_game_point_user,
                'fourth_set_game_point_opponent' => $score->fourth_set_game_point_opponent,
                'fifth_set_game_point_user' => $score->fifth_set_game_point_user,
                'fifth_set_game_point_opponent' => $score->fifth_set_game_point_opponent,
            ]);
        }
    }

    public static function update($match, $score, $db)
    {
        if (!(
            $match->isValidMatchType()
            // * $match->isValidUserId()
            // * $match->isValidOpponentId()
            // * $match->isValidWinFlg()
        )) {
            return false;
        }

        $sql = 'update matches set
                opponent_id = :opponent_id,
                prefecture_id = :prefecture_id,
                city = :city,
                venue = :venue,
                match_date = :match_date,
                match_type = :match_type,
                win_flg = :win_flg
                where id = :id';

        $is_success = $db->execute($sql, [
            ':id' => $match->id,
            ':opponent_id' => $match->opponent_id,
            ':prefecture_id' => $match->prefecture_id,
            ':city' => $match->city,
            ':venue' => $match->venue,
            ':match_date' => $match->match_date,
            ':match_type' => $match->match_type,
            ':win_flg' => $match->win_flg,
        ]);

        if ($is_success) {
            $sql = 'update scores set
                    set_point_user = :set_point_user,
                    set_point_opponent = :set_point_opponent,
                    first_set_game_point_user = :first_set_game_point_user,
                    first_set_game_point_opponent = :first_set_game_point_opponent,
                    second_set_game_point_user = :second_set_game_point_user,
                    second_set_game_point_opponent = :second_set_game_point_opponent,
                    third_set_game_point_user = :third_set_game_point_user,
                    third_set_game_point_opponent = :third_set_game_point_opponent,
                    fourth_set_game_point_user = :fourth_set_game_point_user,
                    fourth_set_game_point_opponent = :fourth_set_game_point_opponent,
                    fifth_set_game_point_user = :fifth_set_game_point_user,
                    fifth_set_game_point_opponent = :fifth_set_game_point_opponent
                    where match_id = :match_id';

            return $db->execute($sql, [
                ':set_point_user' => $score->set_point_user,
                ':set_point_opponent' => $score->set_point_opponent,
                ':first_set_game_point_user' => $score->first_set_game_point_user,
                ':first_set_game_point_opponent' => $score->first_set_game_point_opponent,
                ':second_set_game_point_user' => $score->second_set_game_point_user,
                ':second_set_game_point_opponent' => $score->second_set_game_point_opponent,
                ':third_set_game_point_user' => $score->third_set_game_point_user,
                ':third_set_game_point_opponent' => $score->third_set_game_point_opponent,
                ':fourth_set_game_point_user' => $score->fourth_set_game_point_user,
                ':fourth_set_game_point_opponent' => $score->fourth_set_game_point_opponent,
                ':fifth_set_game_point_user' => $score->fifth_set_game_point_user,
                ':fifth_set_game_point_opponent' => $score->fifth_set_game_point_opponent,
                ':match_id' => $score->match_id,
            ]);
        }
    }

    public static function logical_delete($match_id, $db)
    {
        $sql = 'update matches set
        del_flg = 1
        where id = :id';

        return $db->execute($sql, [':id' => $match_id,]);
    }

    public static function fetchByMatchId($match_id)
    {
        //todo
        // if (!$match->isValidId()) {
        //     return false;
        // }

        $db = new DataSource;
        $sql = '
        select * from matches where id = :id';

        $result = $db->selectOne($sql, [
            ':id' => $match_id
        ], DataSource::CLS, MatchModel::class);

        return $result;
    }

    public static function isYourMatch($match_id, $user)
    {
        if (!(MatchModel::validateId($match_id))) {
            return false;
        }

        $db = new DataSource;
        $sql = '
        select * from matches m
        where m.id = :match_id
            and m.user_id = :user_id
            and m.del_flg != 1;
        ';

        $result = $db->selectOne($sql, [
            ':match_id' => $match_id,
            ':user_id' => $user->id,
        ]);

        return $result;
    }

    public static function fetchAllOpponent($opponent_id)
    {
        $db = new DataSource;
        $sql = 'select * from users where id = :id or nickname = :nickname order by nickname desc;';

        $result = $db->select($sql, [
            ':id' => $opponent_id,
            ':nickname' => $opponent_id
        ], DataSource::CLS, UserModel::class);

        return $result;
    }

    public static function fetchOpponentIdByOpponentName($opponent_name)
    {
        $db = new DataSource;
        $sql = 'select id from users where nickname = :nickname;';

        $result = $db->selectOne($sql, [
            ':nickname' => $opponent_name
        ], DataSource::CLS, UserModel::class);

        return $result;
    }

    public static function fetchOpponentNameByOpponentId($opponent_id)
    {
        $db = new DataSource;
        $sql = 'select nickname from users where id = :id;';

        $result = $db->selectOne($sql, [
            ':id' => $opponent_id
        ], DataSource::CLS, UserModel::class);

        return $result;
    }
}
