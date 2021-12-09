<?php
namespace controller\login;

use lib\Auth;
use lib\Msg;
use model\UserModel;

function get() {


    \view\login\index();

}

function post() {

    $email = get_param('email', '');
    $pwd = get_param('pwd', '');

    if(Auth::login($email, $pwd)) {

        $user = UserModel::getSession();
        Msg::push(Msg::INFO, "{$user->nickname}さん、ようこそ。");
        redirect(GO_HOME);

    } else {

        redirect(GO_REFERER);

    }
}