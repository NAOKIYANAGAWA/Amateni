<?php

namespace model\profile\match;

use lib\Msg;
use model\AbstractModel;

class ScoreModel extends AbstractModel
{
    public int $match_id;
    public int $set_point_user;
    public int $set_point_opponent;
    public int $first_set_game_point_user;
    public int $first_set_game_point_opponent;
    public int $second_set_game_point_user;
    public int $second_set_game_point_opponent;
    public int $third_set_game_point_user;
    public int $third_set_game_point_opponent;
    public int $fourth_set_game_point_user;
    public int $fourth_set_game_point_opponent;
    public int $fifth_set_game_point_user;
    public int $fifth_set_game_point_opponent;
    protected static $SESSION_NAME = '_score';

    // public function __construct()
	// {
	// 	$this->init();
	// }

    public function init_params()
    {
        $this->match_id = 0;
        $this->set_point_user = 0;
        $this->set_point_opponent = 0;
        $this->first_set_game_point_user = 0;
        $this->first_set_game_point_opponent = 0;
        $this->second_set_game_point_user = 0;
        $this->second_set_game_point_opponent = 0;
        $this->third_set_game_point_user = 0;
        $this->third_set_game_point_opponent = 0;
        $this->fourth_set_game_point_user = 0;
        $this->fourth_set_game_point_opponent = 0;
        $this->fifth_set_game_point_user = 0;
        $this->fifth_set_game_point_opponent = 0;
    }

    public static function set_params($target, $params)
    {
        foreach ($target as $key1 => $value1) {
            foreach ($params as $key2 => $value2) {
                if($key1 == $key2) {
                    $target->$key1 = $value2;
                }
            }
        }

        return $target;
    }
}
