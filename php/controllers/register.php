<?php

namespace controller\register;

use lib\Auth;
use lib\Msg;
use model\UserModel;

function get()
{

    \view\register\index();

}

function post()
{
    $user = new UserModel;
    $user->email = get_param('email', '');
    $user->pwd = get_param('pwd', '');
    $user->nickname = get_param('nickname', '');

    if (Auth::register($user)) {

        Msg::push(Msg::INFO, "{$user->nickname}さん、ようこそ。");
        redirect(GO_HOME);

    } else {

        redirect(GO_REFERER);

    }
}
