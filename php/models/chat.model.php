<?php
namespace model;

use lib\Msg;

class ChatModel extends AbstractModel
{
    public int $agent_id;
    public int $is_agent;
    public string $created_at;

    protected static $SESSION_NAME = '_chat';

    public function init_params()
    {
        $this->agent_id = 0;
        $this->is_agent = 1;
        $this->created_at = date('Y-m-d H:i:s');
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

    public static function validChatRoom($init_chat_room, $user)
    {
        $res = false;
        if ($init_chat_room->agent_id == $user->id || $init_chat_room->client_id == $user->id) {
            $res = true;
        }

        return $res;
    }
}
