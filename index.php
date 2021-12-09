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
require_once SOURCE_BASE . 'models/chat.model.php';
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
require_once SOURCE_BASE . 'partials/profile/side_menu.php';
require_once SOURCE_BASE . 'partials/profile/match/history.php';
require_once SOURCE_BASE . 'partials/profile/match/dashboard.php';
require_once SOURCE_BASE . 'partials/profile/match/detail.php';

// View
require_once SOURCE_BASE . 'views/top.php';
require_once SOURCE_BASE . 'views/login.php';
require_once SOURCE_BASE . 'views/register.php';
require_once SOURCE_BASE . 'views/profile.php';
require_once SOURCE_BASE . 'views/profile/edit.php';
require_once SOURCE_BASE . 'views/profile/match.php';
require_once SOURCE_BASE . 'views/profile/match/edit.php';
require_once SOURCE_BASE . 'views/profile/match/delete.php';
require_once SOURCE_BASE . 'views/chat.php';

use function lib\route;

session_start();

try {
    $url = parse_url(CURRENT_URI);
    $rpath = str_replace(BASE_CONTEXT_PATH, '', $url['path']);
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    route($rpath, $method);
} catch (Throwable $e) {
    die('<h1>エラーが発生しました管理者にお問い合わせください</h1>');
}
