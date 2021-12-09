<?php
namespace view\profile\match\edit;

use staticList;

function index($params, $is_edit)
{
    $header_title = $is_edit ? '試合編集' : '試合登録';
    $opponent_name = $is_edit ? $params['match']->opponent_id : '対戦相手'; ?>

<?php \partials\header(); ?>

    <h1 class="h2 mb-3"><?php echo $header_title ?></h1>

    <div class="bg-white p-4 shadow-sm mx-auto rounded">
        <form class="validate-form" action="<?php echo CURRENT_URI; ?>" method="POST" novalidate autocomplete="off">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">基本情報</h1>
            </div>
            <input type="hidden" name="id" value="<?php echo $params['match']->id; ?>">
            <div class="form-group">
                <span class="text-danger">*</span><label for="opponent_id">対戦相手</label>
                <input type="text" id="opponent_id" name="opponent_id" value="<?php echo $params['match']->opponent_id; ?>" class="form-control" placeholder="対戦相手のユーザー名を入力" autofocus>
                <div class="valid-feedback">
                    対戦相手が見つかりました
                </div>
                <div class="invalid-feedback">
                    対戦相手が見つかりません
                </div>
            </div>
            <div class="form-group">
            <span class="text-danger">*</span><label for="match_type">試合形式</label>
                <select name="match_type" id="match_type" class="form-control">
                    <?php foreach (StaticList::$match_type as $key=>$value): ?>
                        <?php if ($params['match']->match_type === $key) :?>
                            <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                        <?php else: ?>
                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="win_flg">試合結果</label>
                <select name="win_flg" id="win_flg" class="form-control">
                    <?php foreach (StaticList::$win_flg as $key=>$value): ?>
                        <?php if ($params['match']->win_flg === $key) :?>
                            <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                        <?php else: ?>
                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="match_date">試合日</label>
                <div>
                    <input id="sandbox-container" type="text" class="form-control" name="match_date" value="<?php echo date('Y/m/d', strtotime($params['match']->match_date)); ?>">
                </div>
            </div>

            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">試合詳細</h1>
            </div>
            <div class="text-center mb-3"><span class="h3">スコア</span></div>
            <div class="text-center mt-3"><span class="h5">TOTAL SET</span></div>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="row col-3 m-0"><span class="text-center h3 m-0 w-100"><?php echo $params['user']->nickname; ?></span></div>
                    <div class="row col-3 form-group m-0">
                        <label for="set_point_user"></label>
                        <select name="set_point_user" id="set_point_user" class="form-control">
                            <?php foreach (StaticList::$set_point_user as $key=>$value): ?>
                                <?php if ($params['score']->set_point_user === $key) :?>
                                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                        <span class="h3">-</span>
                    <div class="row col-3 form-group m-0">
                        <label for="set_point_opponent"></label>
                        <select name="set_point_opponent" id="set_point_opponent" class="form-control">
                            <?php foreach (StaticList::$set_point_opponent as $key=>$value): ?>
                                <?php if ($params['score']->set_point_opponent === $key) :?>
                                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <div class="row col-3 m-0"><span class="text-center h3 m-0 w-100"><?php echo $opponent_name; ?></span></div>
            </div>

            <div class="text-center mt-3"><span class="h5">1st SET</span></div>
            <div class="container d-flex justify-content-center">
                <div class="row col-3 form-group m-0">
                    <label for="first_set_game_point_user"></label>
                    <select name="first_set_game_point_user" id="first_set_game_point_user" class="form-control">
                        <?php foreach (StaticList::$first_set_game_point_user as $key=>$value): ?>
                            <?php if ($params['score']->first_set_game_point_user === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <span class="h3">-</span>
                <div class="row col-3 form-group m-0">
                    <label for="first_set_game_point_opponent"></label>
                    <select name="first_set_game_point_opponent" id="first_set_game_point_opponent" class="form-control">
                        <?php foreach (StaticList::$first_set_game_point_opponent as $key=>$value): ?>
                            <?php if ($params['score']->first_set_game_point_opponent === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="text-center mt-3"><span class="h5">2st SET</span></div>
            <div class="container d-flex justify-content-center">
                <div class="row col-3 form-group m-0">
                    <label for="second_set_game_point_user"></label>
                    <select name="second_set_game_point_user" id="second_set_game_point_user" class="form-control">
                        <?php foreach (StaticList::$second_set_game_point_user as $key=>$value): ?>
                            <?php if ($params['score']->second_set_game_point_user === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <span class="h3">-</span>
                <div class="row col-3 form-group m-0">
                    <label for="second_set_game_point_opponent"></label>
                    <select name="second_set_game_point_opponent" id="second_set_game_point_opponent" class="form-control">
                        <?php foreach (StaticList::$second_set_game_point_opponent as $key=>$value): ?>
                            <?php if ($params['score']->second_set_game_point_opponent === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="text-center mt-3"><span class="h5">3st SET</span></div>
            <div class="container d-flex justify-content-center">
                <div class="row col-3 form-group m-0">
                    <label for="third_set_game_point_user"></label>
                    <select name="third_set_game_point_user" id="third_set_game_point_user" class="form-control">
                        <?php foreach (StaticList::$third_set_game_point_user as $key=>$value): ?>
                            <?php if ($params['score']->third_set_game_point_user === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <span class="h3">-</span>
                <div class="row col-3 form-group m-0">
                    <label for="third_set_game_point_opponent"></label>
                    <select name="third_set_game_point_opponent" id="third_set_game_point_opponent" class="form-control">
                        <?php foreach (StaticList::$third_set_game_point_opponent as $key=>$value): ?>
                            <?php if ($params['score']->third_set_game_point_opponent === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="text-center mt-3"><span class="h5">4st SET</span></div>
            <div class="container d-flex justify-content-center">
                <div class="row col-3 form-group m-0">
                    <label for="fourth_set_game_point_user"></label>
                    <select name="fourth_set_game_point_user" id="fourth_set_game_point_user" class="form-control">
                        <?php foreach (StaticList::$fourth_set_game_point_user as $key=>$value): ?>
                            <?php if ($params['score']->fourth_set_game_point_user === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <span class="h3">-</span>
                <div class="row col-3 form-group m-0">
                    <label for="fourth_set_game_point_opponent"></label>
                    <select name="fourth_set_game_point_opponent" id="fourth_set_game_point_opponent" class="form-control">
                        <?php foreach (StaticList::$fourth_set_game_point_opponent as $key=>$value): ?>
                            <?php if ($params['score']->fourth_set_game_point_opponent === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="text-center mt-3"><span class="h5">5st SET</span></div>
            <div class="container d-flex justify-content-center">
                <div class="row col-3 form-group m-0">
                    <label for="fifth_set_game_point_user"></label>
                    <select name="fifth_set_game_point_user" id="fifth_set_game_point_user" class="form-control">
                        <?php foreach (StaticList::$fifth_set_game_point_user as $key=>$value): ?>
                            <?php if ($params['score']->fifth_set_game_point_user === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <span class="h3">-</span>
                <div class="row col-3 form-group m-0">
                    <label for="fifth_set_game_point_opponent"></label>
                    <select name="fifth_set_game_point_opponent" id="fifth_set_game_point_opponent" class="form-control">
                        <?php foreach (StaticList::$fifth_set_game_point_opponent as $key=>$value): ?>
                            <?php if ($params['score']->fifth_set_game_point_opponent === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">開催地詳細</h1>
            </div>
            <div class="mt-5">
                <div class="form-group">
                    <label for="venue">施設名</label>
                    <div container d-flex mt-5>
                        <input id="venue" class="form-control" type="text" name="venue" value="<?php echo $params['match']->venue; ?>">
                        <input type="button" class="btn btn-primary shadow-sm mt-3" value="検索" onclick="codeAddress()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="prefecture_id">都道府県</label>
                    <select name="prefecture_id" id="prefecture_id" class="form-control">
                        <?php foreach (StaticList::$prefecture as $key=>$value): ?>
                            <?php if ($params['match']->prefecture_id === $key) :?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">市区町村</label>
                    <input id="city" type="text" name="city" value="<?php echo $params['match']->city; ?>" class="form-control">
                </div>
                <div id="map" class="w-100" style="height: 600px;"></div>
            </div>

            <div class="d-flex align-items-center mt-5">
                <div>
                    <input type="submit" value="送信" class="btn btn-primary shadow-sm mr-3">
                </div>
                <div>
                    <a href="<?php the_url('profile/match'); ?>">戻る</a>
                </div>
            </div>

        </form>
    </div>

<?php \partials\footer(); ?>

<?php
}
