<?php
namespace controller\line;

use lib\Auth;
use lib\Msg;
use Throwable;
use model\UserModel;
use db\ChatQuery;
use model\ChatModel;



use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;

function get()
{
    $channel_access_token = 'XXXXXXXXX';
    $channel_secret = 'XXXXXXXXX';

    $http_client = new CurlHTTPClient($channel_access_token);
    $bot = new LINEBot($http_client, ['channelSecret' => $channel_secret]);
    $signature = $_SERVER['HTTP_' . HTTPHeader::LINE_SIGNATURE];
    $http_request_body = file_get_contents('php://input');
    $events = $bot->parseEventRequest($http_request_body, $signature);
    $event = $events[0];
    $reply_token = $event->getReplyToken();

    $yes_button = new PostbackTemplateActionBuilder('はい', 'button=1');
    $no_button = new PostbackTemplateActionBuilder('キャンセル', 'button=0');
    $actions = [$yes_button, $no_button];
    $button = new ButtonTemplateBuilder('タイトル', 'テキスト', '', $actions);
    $button_message = new TemplateMessageBuilder('タイトル', $button);
    $bot->replyMessage($reply_token, $button_message);
}
