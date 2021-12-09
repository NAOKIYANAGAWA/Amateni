<?php
namespace controller\profile\match;

use lib\Auth;
use model\UserModel;
use db\UserQuery;
use db\profile\MatchQuery;
use model\profile\match\scoreModel;

function get()
{
    Auth::requireLogin();
    $params['auth_user'] = UserModel::getSession();

    $permission = false;

    if (get_param('user_id', null, false)) {
        $user_id = get_param('user_id', null, false);
    } else {
        $user_id = $params['auth_user']->id;
    }

    //ユーザー権限
    if ($params['auth_user']->id == $user_id) {
        $permission = true;
    }

    //試合詳細を取得
    $score = new ScoreModel;
    if (get_param('match_id', null, false)) {
        $score->match_id = get_param('match_id', null, false);
    } else {
        $match_id = MatchQuery::fetchMostRecentMatchByUserId($user_id);
        if(!$match_id){
            redirect(GO_REFERER);
        }
        $score->match_id = $match_id->id;
    }

    $params['match_detail'] = MatchQuery::fetchScoreByMatchId($score->match_id);
    $params['matchs'] = MatchQuery::joinUsers($user_id);
    $params['users'] = MatchQuery::fetchAllUsers();
    $params['scores'] = MatchQuery::fetchAllScores($params['matchs']);
    $params['user_id'] = $user_id;


    \view\profile\match\index($params, $permission);
}
