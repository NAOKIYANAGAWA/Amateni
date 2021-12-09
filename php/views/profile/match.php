<?php
namespace view\profile\match;

function index($params, $permission)
{
    ?>

<?php \partials\header(); ?>

    <div class="container-fluid">
        <div class="row">

            <?php \partials\profile\side_menu($params['user_id']); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <?php \partials\profile\match\detail($params['matchs'], $params['match_detail'], $params['users']); ?>

                <?php \partials\profile\match\history($params['matchs'], $params['users'], $params['scores'], $params['user_id'], $permission); ?>

            </main>
        </div>
    </div>

<?php \partials\footer(); ?>

<?php
}
