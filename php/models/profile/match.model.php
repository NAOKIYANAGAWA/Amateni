<?php

namespace model\profile;

use lib\Msg;
use model\AbstractModel;
use db\profile\MatchQuery;
use staticList;

class MatchModel extends AbstractModel
{
    public int $id;
    public int $user_id;
    // public int $opponent_id;
    public int $prefecture_id;
    public string $city;
    public string $venue;
    public string $match_date;
    public int $match_type;
    public int $win_flg;
    protected static $SESSION_NAME = '_match';

    // public function __construct()
    // {
    // 	$this->init();
    // }

    public function init_params()
    {
        $this->id = 0;
        $this->user_id = 0;
        $this->prefecture_id = 0;
        $this->city = '';
        $this->venue = '';
        $this->match_date = date('Y-m-d H:i:s');
        $this->match_type = 0;
        $this->win_flg = 0;
    }

    public static function set_params($target, $params)
    {
        foreach ($target as $key1 => $value1) {
            foreach ($params as $key2 => $value2) {
                if ($key1 == $key2) {
                    $target->$key1 = $value2;
                }
            }
        }

        return $target;
    }

    public function isValidMatchType()
    {
        return static::validateMatchType($this->match_type);
    }

    public static function validateMatchType($val)
    {
        $res = true;

        if (empty($val)) {
            Msg::push(Msg::ERROR, '試合形式は入力必須です。');
            $res = false;
        }

        if (!is_staticListParam($val, staticList::$match_type)) {
            Msg::push(Msg::ERROR, 'パラメータが不正です。');
            $res = false;
        }

        return $res;
    }

    public function isValidId()
    {
        return static::validateId($this->match_id);
    }

    public static function validateId($val)
    {
        $res = true;

        if (empty($val) || !is_numeric($val)) {
            Msg::push(Msg::ERROR, 'パラメータが不正です。');
            $res = false;
        }

        return $res;
    }

    public static function get_wins_and_lose($matchs)
    {
        $result = [
        'wins' => 0,
        'loses' => 0,
    ];
        foreach ($matchs as $match) {
            if ($match->win_flg === 1) {
                $result['wins']++;
            } else {
                $result['loses']++;
            }
        }
        return $result;
    }

    public static function count_points($matchs)
    {
        $points = 0;
        foreach ($matchs as $match) {
            if ($match->win_flg === 1) {
                switch ($match->match_type) {
            case 1:
                $points += 10;
                break;
            case 3:
                $points += 30;
                break;
            case 5:
                $points += 50;
                break;
            };
            }
        }

        return $points;
    }

    public static function get_ranking($matchs, $users)
    {
        $rank_info = [];

        foreach ($users as $user) {
            foreach ($matchs as $match) {
                if ($user->id === $match->user_id && $match->win_flg === 1) {
                    $rank_info[$user->id]['user_id'] = $user->id;
                    $rank_info[$user->id]['nickname'] = $user->nickname;

                    //勝敗集計
                    $rank_info[$user->id]['wins']++;

                    //ポイント集計
                    if ($match->win_flg === 1) {
                        switch ($match->match_type) {
                        case 1:
                            $rank_info[$user->id]['points'] += 10;
                            break;
                        case 3:
                            $rank_info[$user->id]['points'] += 30;
                            break;
                        case 5:
                            $rank_info[$user->id]['points'] += 50;
                            break;
                        };
                    }
                }
            }
        }

        //ポイントを降順に並び替え
        foreach ($rank_info as $key => $value) {
            $sort_keys[$key] = $value['points'];
        }
        array_multisort($sort_keys, SORT_DESC, $rank_info);

        //上位10のみ取得
        return  array_slice($rank_info, 0, 30);
    }

    public static function add_current_time($date)
    {
        return date('Y-m-d H:i:s', strtotime($date.date('H:i:s')));
    }
}
