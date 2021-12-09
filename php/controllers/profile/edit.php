<?php
namespace controller\profile\edit;

use lib\Auth;
use lib\Msg;
use Throwable;
use db\DataSource;
use model\UserModel;
use db\UserQuery;

function get()
{
    Auth::requireLogin();

    $user_id = get_param('user_id', null, false);

    $user = UserQuery::fetchById($user_id);

    $param['user'] = $user;

    \view\profile\edit\index($param);
}

function post()
{
    Auth::requireLogin();

    $params = $_POST;

    $user = new UserModel;
    $user->init_params();
    $user = UserModel::set_params($user, $params);

    try {
        $db = new DataSource;

        $db->begin();

        $is_success = UserQuery::update($user, $db);
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        $is_success = false;
    }

    if ($is_success) {
        $db->commit();
        Msg::push(Msg::INFO, 'ユーザー情報を更新しました。');
        redirect('profile?user_id=' . $user->id);
    } else {
        $db->rollback();
        Msg::push(Msg::ERROR, 'ユーザー情報の更新に失敗しました。');
        // MatchModel::setSession($match);
        redirect(GO_REFERER);
    }
}
