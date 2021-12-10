<?php
namespace view\chat;

function index($params = [])
{
    ?>

<?php \partials\header(); ?>

<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0 pre-scrollable" style="width:auto; height:auto; max-height:500px; min-height:500px;">
                        <?php foreach ($params['chat_rooms'] as $chat_room): ?>
                        <li class="clearfix">
                            <a href="<?php the_url('chat?room_id='); ?><?php echo $chat_room->id; ?>">
                                <img src="<?php echo BASE_IMAGE_PATH; ?>profile.png" alt="avatar">
                                <div class="about">
                                    <div class="name"><?php echo $chat_room->nickname; ?></div>
                                    <div class="status"> <i class="fa fa-circle offline"></i><?php echo $chat_room->updated_at; ?></div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php foreach ($params['chat_rooms'] as $chat_room): ?>
                                    <?php if ($chat_room->id == $params['init_chat_room']->id): ?>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                            <img src="<?php echo BASE_IMAGE_PATH; ?>profile.png" alt="avatar">
                                        </a>
                                        <div class="chat-about">
                                            <h6 class="m-b-0"><?php echo $chat_room->nickname; ?></h6>
                                            <small><?php echo $chat_room->updated_at; ?></small>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history pre-scrollable" style="width:auto; max-height:500px; min-height:500px;">
                        <ul class="chat-history-inner m-b-0">
                            <?php foreach ($params['chats'] as $chat): ?>
                                <?php if ($params['init_chat_room']->id == $chat->chat_room_id): ?>
                                    <?php if ($chat->user_id == $params['user']->id): ?>
                                    <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time"><?php echo $chat->created_at; ?></span>
                                            <img src="<?php echo BASE_IMAGE_PATH; ?>profile.png" alt="avatar">
                                        </div>
                                        <div class="message other-message float-right"><?php echo $chat->message; ?></div>
                                    </li>
                                    <?php else: ?>
                                    <li class="clearfix">
                                        <div class="message-data">
                                            <img src="<?php echo BASE_IMAGE_PATH; ?>profile.png" alt="avatar">
                                            <span class="message-data-time"><?php echo $chat->created_at; ?></span>
                                        </div>
                                        <div class="message my-message"><?php echo $chat->message; ?></div>
                                    </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <input id="chat_room_id" type="hidden" name="chat_room_id" value="<?php echo $params['init_chat_room']->id; ?>">
                            <input id="user_id" type="hidden" name="user_id" value="<?php echo $params['user']->id; ?>">
                            <input id="chat_message" type="text" class="form-control" placeholder="Enter text here...">
                            <div class="input-group-prepend">
                                <button id="send_message_btn" class="btn btn-primary">送信</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`
</div>

<?php \partials\footer(); ?>

<?php
}
