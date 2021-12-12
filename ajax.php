<?php
// ini_set('display_errors', "On");

require_once 'config.php';
require_once 'staticList.php';

// Library
require_once SOURCE_BASE . 'libs/helper.php';
require_once SOURCE_BASE . 'libs/auth.php';
require_once SOURCE_BASE . 'libs/router.php';

// Model
require_once SOURCE_BASE . 'models/abstract.model.php';
require_once SOURCE_BASE . 'models/user.model.php';
require_once SOURCE_BASE . 'models/profile/match.model.php';
require_once SOURCE_BASE . 'models/profile/match/score.model.php';

// Message
require_once SOURCE_BASE . 'libs/message.php';

// DB
require_once SOURCE_BASE . 'db/datasource.php';
require_once SOURCE_BASE . 'db/user.query.php';
require_once SOURCE_BASE . 'db/chat.query.php';
require_once SOURCE_BASE . 'db/profile/match.query.php';

// Partials
require_once SOURCE_BASE . 'partials/header.php';
require_once SOURCE_BASE . 'partials/footer.php';
require_once SOURCE_BASE . 'partials/profile/nav_tabs.php';
require_once SOURCE_BASE . 'partials/profile/match/history.php';
require_once SOURCE_BASE . 'partials/profile/match/dashboard.php';
require_once SOURCE_BASE . 'partials/profile/match/detail.php';

// View
require_once SOURCE_BASE . 'views/top.php';
require_once SOURCE_BASE . 'views/login.php';
require_once SOURCE_BASE . 'views/register.php';
require_once SOURCE_BASE . 'views/profile.php';
require_once SOURCE_BASE . 'views/profile/match.php';
require_once SOURCE_BASE . 'views/profile/match/edit.php';
require_once SOURCE_BASE . 'views/profile/match/delete.php';

use db\profile\MatchQuery;
use db\ChatQuery;
use lib\Msg;

if ($_GET['opponent_id']) {
    $opponents = MatchQuery::fetchAllOpponent($_GET['opponent_id']);

    foreach ($opponents as $opponent) {
        echo $opponent->nickname;
    }
}

if ($_POST) {
    $params = $_POST;

    if (empty($params['chat_room_id'])) {
        return;
    }

    if (empty($params['message'])) {
        return;
    }

    return ChatQuery::insert($params);
}

if ($_GET['nickname']) {
    $nicknames = MatchQuery::fetchUserCandidates($_GET['nickname']);

    $json = json_encode($nicknames);
    echo $json;
}
