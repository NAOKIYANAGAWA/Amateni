<?php
namespace controller\profile\match\edit;

use lib\Auth;
use lib\Msg;
use Throwable;
use db\DataSource;
use model\UserModel;
use db\profile\MatchQuery;
use model\profile\MatchModel;
use model\profile\match\scoreModel;

function get()
{
    Auth::requireLogin();

    $match = MatchModel::getSessionAndFlush();
    $score = ScoreModel::getSessionAndFlush();

    if (!empty($match)) {
        $match->opponent_id = MatchQuery::fetchOpponentNameByOpponentId($match->opponent_id)->nickname;
        $params['match'] = $match;
        $params['score'] = $score;
        \view\profile\match\edit\index($params, true);
        return;
    }

    // $match = new MatchModel;
    $match_id = get_param('match_id', null, false);
    $user = UserModel::getSession();

    Auth::requirePermission($match_id, $user);

    // $match = new MatchModel;
    $match = MatchQuery::fetchByMatchId($match_id);
    $match->opponent_id = MatchQuery::fetchOpponentNameByOpponentId($match->opponent_id)->nickname;

    // $score = new ScoreModel;
    $score = MatchQuery::fetchScoreByMatchId($match_id);

    $params['match'] = $match;
    $params['score'] = $score;
    $params['user'] = $user;

    \view\profile\match\edit\index($params, true);
}

function post()
{
    Auth::requireLogin();

    $params = $_POST;

    $match = new MatchModel;
    $match->init_params();
    $match = MatchModel::set_params($match, $params);
    $match->match_date = MatchModel::add_current_time($match->match_date);

    //nickname->idに変換
    $match->opponent_id = MatchQuery::fetchOpponentIdByOpponentName(get_param('opponent_id', null))->id;

    $score = new ScoreModel;
    $score->init_params();
    $score = ScoreModel::set_params($score, $params);
    $score->match_id = get_param('id', null);

    try {
        $db = new DataSource;

        $db->begin();

        $is_success = MatchQuery::update($match, $score, $db);
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        $is_success = false;
    }

    if ($is_success) {
        $db->commit();
        Msg::push(Msg::INFO, '試合の登録に成功しました。');
        redirect('profile/match');
    } else {
        $db->rollback();
        Msg::push(Msg::ERROR, '試合の登録に失敗しました。');
        MatchModel::setSession($match);
        ScoreModel::setSession($score);
        redirect(GO_REFERER);
    }
}
