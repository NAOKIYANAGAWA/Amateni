<?php
namespace view\profile\match\delete;

use staticList;

function index($match_id)
{
    ?>

<?php \partials\header(); ?>

        <div class="d-flex align-items-center justify-content-center mt-5">
            <div>
                <a href="<?php the_url('profile/match/delete?action=delete&match_id='); ?><?php echo $match_id; ?>" class="btn btn-danger shadow-sm mr-3">削除</a>
                <a href="<?php the_url('profile/match'); ?>" class="btn btn-primary shadow-sm mr-3">キャンセル</a>
            </div>
        </div>

<?php \partials\footer(); ?>

<?php
}
