<?php
namespace controller\top;

use db\profile\MatchQuery;
use model\profile\MatchModel;

function get()
{
    //todo ソート機能
    //検索機能
    $matchs = MatchQuery::fetchAll();
    $users = MatchQuery::fetchDistinctUsers();

    //getでparamを渡してソート、検索
    $ranking = MatchModel::get_ranking($matchs, $users);

    \view\top\index($ranking);
}
