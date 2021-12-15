<?php

namespace view\login;

function index()
{
    ?>

    <?php \partials\header(); ?>

    <h1 class="sr-only">ログイン</h1>
    <div class="mt-5">
        <div class="text-center mb-4">
            <img width="65" src="images/profile.png" alt="サイトロゴ">
        </div>
        <div class="login-form bg-white p-4 shadow-sm mx-auto rounded">
            <form class="validate-form" action="<?php echo CURRENT_URI; ?>" method="POST" novalidate autocomplete="off">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control validate-target" required maxlength="30" autofocus />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="pwd">パスワード</label>
                    <input id="pwd" type="password" name="pwd" minlength="4" required tabindex="2" pattern="[a-zA-Z0-9]+" class="form-control validate-target" />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <a href="<?php the_url('register'); ?>">アカウント登録</a>
                    </div>
                    <div>
                        <input type="submit" value="ログイン" class="btn btn-primary shadow-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center mt-5">
        <p class="text-center">Lineでログイン</p>
        <button type="button" class="btn btn-link">
            <a href="<?php echo LINE_LOGIN_URL; ?>"><img src="<?php echo BASE_IMAGE_PATH; ?>line_btn_login_base.png" alt="" width="100%" height="50px"></a>
        </button>
    </div>

    <?php \partials\footer(); ?>

<?php
} ?>