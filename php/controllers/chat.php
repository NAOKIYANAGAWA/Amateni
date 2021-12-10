<?php
namespace controller\chat;

use lib\Auth;
use lib\Msg;
use Throwable;
use model\UserModel;
use db\ChatQuery;
use model\ChatModel;

function get()
{
    Auth::requireLogin();
    $user = UserModel::getSession();

    $user_id = get_param('user_id', null, false);
    if ($user_id) {
        try {
            $room_id = ChatQuery::createChatRoom($user->id, $user_id);

            if ($room_id !== false) {
                $is_success = true;
            } else {
                $is_success = false;
            }
        } catch (Throwable $e) {
            Msg::push(Msg::DEBUG, $e->getMessage());
            $is_success = false;
        }

        if ($is_success) {
            redirect('chat?room_id=' . $room_id);
        } else {
            Msg::push(Msg::ERROR, 'メッセージを送信できません。');
            redirect('404');
        }
    }

    $room_id = get_param('room_id', null, false);
    if ($room_id) {
        $init_chat_room = ChatQuery::fetchInitChatRoomByRoomId($room_id);
    } else {
        $init_chat_room = ChatQuery::fetchInitChatRoom($user);

        if (!$init_chat_room) {
            \view\chat\index();
        }
    }

    //チャット権限
    $room_id = ChatModel::validChatRoom($init_chat_room, $user);
    if (!$room_id) {
        redirect('404');
    }

    $chat_rooms = ChatQuery::fetchALLChatRooms($user);
    $chats = ChatQuery::fetchALLChats($init_chat_room->id);

    $params['init_chat_room'] = $init_chat_room;
    $params['chat_rooms'] = $chat_rooms;
    $params['chats'] = $chats;
    $params['user'] = $user;

    \view\chat\index($params);
}
