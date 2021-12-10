<?php
namespace controller\top;

use db\profile\MatchQuery;
use model\profile\MatchModel;

function get()
{
    //todo ソート機能

    $user_nickname = get_param('search', null, false);

    if ($user_nickname) {
        $users = MatchQuery::fetchByUserNickname(trim($user_nickname));
    } else {
        $users = MatchQuery::fetchDistinctUsers();
    }

    $matchs = MatchQuery::fetchAll();

    //getでparamを渡してソート
    $ranking = MatchModel::get_ranking($matchs, $users);

    \view\top\index($ranking);
}
