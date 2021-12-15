<?php
namespace controller\auth\line\callback;

use lib\Msg;

function get()
{
    if (!$_GET["code"]) {
        Msg::push(Msg::ERROR, 'ログインできませんでした。');
        redirect('login');
    }

    $postData = array(
    'grant_type'    => 'authorization_code',
    'code'          => $_GET['code'],
    'redirect_uri'  => LINE_CALLBACK_URL,
    'client_id'     => LINE_CLIENT_ID,
    'client_secret' => LINE_CLIENT_SECRET,
);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/oauth2/v2.1/token');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response);
    $accessToken = $json->access_token;


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $accessToken));
    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/profile');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response);
    $userInfo= json_decode(json_encode($json), true);

    echo '<p>ようこそ' . $userInfo['displayName'] . 'さん</p>';
    echo '<img src="' . $userInfo['pictureUrl'] . '" alt="">';
}
