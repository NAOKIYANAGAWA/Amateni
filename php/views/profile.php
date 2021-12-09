<?php
namespace view\profile;

function index($params, $permission)
{
    ?>

<?php \partials\header(); ?>

    <div class="container-fluid">
        <div class="row">

            <?php \partials\profile\side_menu($params['user']->id); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3 mr-3">プロフィール</h1>
                <?php if (!$permission):?>
                    <a href="<?php the_url('chat?user_id='); ?><?php echo $params['user']->id; ?>" class="btn btn-secondary mr-2">メッセージを送る</a>
                <?php endif; ?>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="position-relative">
                        <img class="rounded-circle" width="100" src="<?php echo BASE_IMAGE_PATH; ?>profile.png" alt="">
                        <?php if ($permission):?>
                            <a class="fs-1 position-absolute top-0 start-100 badge" href="<?php the_url('profile/edit?user_id='); ?><?php echo $params['user']->id; ?>">編集</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <span class="mt-1 h3"><?php echo $params['user']->nickname ?></span>
                </div>
                <div class="container d-flex mt-3">
                        <div class="justify-content-center d-block row col-4 m-0 ">
                            <h5 class="text-center">戦績</h5>
                            <span class="text-center d-block w-100"><?php echo $params['result']['wins'] ?>勝<?php echo $params['result']['loses'] ?>敗</span>
                        </div>
                        <div class="justify-content-center d-block row col-4 m-0">
                            <h5 class="text-center">ポイント</h5 >
                            <span class="text-center d-block w-100"><?php echo $params['points'] ?>pt</span>
                        </div>
                        <div class="justify-content-center d-block row col-4 m-0">
                            <h5 class="text-center">レベル</h5>
                            <span class="text-center d-block w-100"><?php echo $params['user']->level; ?></span>
                        </div>
                </div>
            </div>

            </main>
        </div>
    </div>

<?php \partials\footer(); ?>

<?php
}
