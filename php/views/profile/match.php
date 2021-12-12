<?php
namespace view\profile\match;

function index($params, $permission)
{
    ?>

<?php \partials\header(); ?>

    <?php \partials\profile\nav_tabs($params['user_id']); ?>

    <?php \partials\profile\match\detail($params['matchs'], $params['match_detail'], $params['users']); ?>

    <?php \partials\profile\match\history($params['matchs'], $params['users'], $params['scores'], $params['user_id'], $permission); ?>

<?php \partials\footer(); ?>

<?php
}
