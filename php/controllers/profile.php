<?php
namespace controller\profile;

use lib\Auth;
use model\UserModel;
use db\UserQuery;
use model\profile\MatchModel;
use db\profile\MatchQuery;

function get()
{
    Auth::requireLogin();
    $params['auth_user'] = UserModel::getSession();

    if (get_param('user_id', null, false)) {
        $user_id = get_param('user_id', null, false);
        $user = UserQuery::fetchById($user_id);
    } else {
        $user = $params['auth_user']->id;
    }

    //ユーザー権限
    if ($params['auth_user']->id == $user_id) {
        $permission = true;
    }

    $params['matchs'] = MatchQuery::joinUsers($user_id);
    $params['result'] = MatchModel::get_wins_and_lose($params['matchs']);
    $params['points'] = MatchModel::count_points($params['matchs']);
    $params['user'] = $user;

    \view\profile\index($params, $permission);
}
