<?php
namespace view\profile\edit;

use staticList;

function index($param)
{
    ?>

<?php \partials\header(); ?>

    <h1 class="h2 mb-3"><?php echo 'ユーザー編集' ?></h1>

    <div class="bg-white p-4 shadow-sm mx-auto rounded">
        <form class="validate-form" action="<?php echo CURRENT_URI; ?>" method="POST" novalidate autocomplete="off">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">基本情報</h1>
            </div>
            <input type="hidden" name="id" value="<?php echo $param['user']->id; ?>">
            <div class="form-group">
                <span class="text-danger">*</span><label for="nickname">ニックネーム</label>
                <input type="text" id="opponent_id" name="nickname" value="<?php echo $param['user']->nickname; ?>" class="form-control" placeholder="ユーザー名を入力" autofocus>
                <div class="valid-feedback">
                    既に使用されています
                </div>
                <div class="invalid-feedback">
                    使用可能です
                </div>
            </div>
            <div class="form-group">
                <span class="text-danger">*</span><label for="level">レベル</label>
                <select name="level" id="level" class="form-control">
                    <?php foreach (StaticList::$user_level as $key=>$value): ?>
                        <?php if ($param['user']->level == $key) :?>
                            <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                        <?php else: ?>
                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex align-items-center mt-5">
                <div>
                    <input type="submit" value="送信" class="btn btn-primary shadow-sm mr-3">
                </div>
                <div>
                    <a href="<?php the_url('profile?user_id='); ?><?php echo $param['user']->id; ?>">戻る</a>
                </div>
            </div>
        </form>
    </div>

<?php \partials\footer(); ?>

<?php
}
