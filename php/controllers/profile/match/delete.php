<?php
namespace controller\profile\match\delete;

use lib\Auth;
use lib\Msg;
use Throwable;
use db\DataSource;
use db\profile\MatchQuery;
use model\profile\MatchModel;
use model\profile\match\scoreModel;

function get()
{
    Auth::requireLogin();

    $action = get_param('action', null, false);
    $match_id = get_param('match_id', null, false);
    if ($action != 'delete') {
        \view\profile\match\delete\index($match_id);
        return;
    }

    try {
        $db = new DataSource;

        $db->begin();

        $is_success = MatchQuery::logical_delete($match_id, $db);
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        $is_success = false;
    }

    if ($is_success) {
        $db->commit();
        Msg::push(Msg::INFO, '試合を削除しました。');
        redirect('profile/match');
    } else {
        $db->rollback();
        Msg::push(Msg::ERROR, '試合を削除できませんでした。');
        redirect(GO_REFERER);
    }
}
