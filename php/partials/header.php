<?php
namespace partials;

use lib\Auth;
use lib\Msg;
use model\UserModel;

function header()
{
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>アマテニ</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="//fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo BASE_CSS_PATH; ?>style.css">
        <link rel="stylesheet" href="<?php echo BASE_CSS_PATH; ?>chat.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- jQuery, popper.js, Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    </head>
    <body>
        <div id="container">
            <header class="container my-2">
                <nav class="navbar navbar-light">
                    <div class="container-fluid d-flex justify-content-end">
                        <a href="<?php the_url('/'); ?>" class="col-md d-flex align-items-center mb-3 mb-md-0">
                            <img width="50" class="mr-2" src="<?php echo BASE_IMAGE_PATH; ?>logo.png" alt="サイトロゴ">
                            <div class="ml-3">
                                <span class="d-block w-100 m-0 h2">アマテニ</span>
                                <span class="text-center d-block w-100">週末テニスプレイヤーランキング</span>
                            </div>
                        </a>
                        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <form class="validate-form mt-3 d-flex row" action="<?php echo CURRENT_URI; ?>" method="GET" novalidate autocomplete="off">
                                <input list="datalistOptions" id="nickname" name="search" class="form-control col-12" placeholder="ユーザー検索">
                                <datalist id="datalistOptions"></datalist>
                                <input type="submit" value="検索" class="btn btn-primary shadow-sm mt-3 col-12">
                            </form>
                            <?php if (Auth::isLogin()) : ?>
                                <div class="mt-3 text-center">
                                    <a href="<?php the_url('profile/match/create'); ?>" class="">試合登録</a>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="<?php the_url('chat'); ?>" class="">メッセージ</a>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="<?php the_url('profile?user_id='); ?><?php echo UserModel::getSession()->id; ?>" class="mr-2">マイページ</a>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="<?php the_url('logout'); ?>">ログアウト</a>
                                </div>
                            <?php else: ?>
                                <div class="mt-3 text-center">
                                    <a href="<?php the_url('register'); ?>" class="">登録</a>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="<?php the_url('login'); ?>">ログイン</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </header>
            <main class="container py-3">
<?php

    Msg::flush();
}

?>