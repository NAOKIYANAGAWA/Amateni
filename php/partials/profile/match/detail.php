<?php

namespace partials\profile\match;

function detail($matchs, $score, $users)
{
    $game_point_user = [
        $score->first_set_game_point_user,
        $score->second_set_game_point_user,
        $score->third_set_game_point_user,
        $score->fourth_set_game_point_user,
        $score->fifth_set_game_point_user
    ];

    $game_point_opponent = [
        $score->first_set_game_point_opponent,
        $score->second_set_game_point_opponent,
        $score->third_set_game_point_opponent,
        $score->fourth_set_game_point_opponent,
        $score->fifth_set_game_point_opponent
    ]; ?>

    <div class="text-center mb-3 mt-3"><span class="h3">スコア</span></div>
    <div class="text-center mt-3"><span class="h5">TOTAL SET</span></div>
    <div class="container d-flex justify-content-center align-items-center">
    <?php foreach ($matchs as $match) :?>
        <?php if ($match->id === $score->match_id) :?>
            <?php foreach ($users as $user) :?>
                <?php if ($match->user_id === $user['id']) :?>
                    <div class="row col-3 m-0"><span class="text-center h3 m-0 w-100"><?php echo $user['nickname']; ?></span></div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="row col-3 m-0"><span class="text-center h1 m-0 w-100"><?php echo $score->set_point_user ?></span></div>
    <span class="h3">-</span>
    <div class="row col-3 m-0"><span class="text-center h1 m-0 w-100"><?php echo $score->set_point_opponent ?></span></div>
    <?php foreach ($matchs as $match) :?>
        <?php if ($match->id === $score->match_id) :?>
            <?php foreach ($users as $user) :?>
                <?php if ($match->opponent_id === $user['id']) :?>
                    <div class="row col-3 m-0"><span class="text-center h3 m-0 w-100"><?php echo $user['nickname']; ?></span></div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
    <?php foreach ($matchs as $match) :?>
        <?php if ($match->id === $score->match_id) :?>
            <?php for ($i=0; $i < $match->match_type; $i++) :?>
                <div class="text-center mt-3"><span class="h5"><?php echo $i+1; ?>st SET</span></div>
                <div class="container d-flex justify-content-center align-items-center">
                    <p class="text-center mb-0"><?php echo $game_point_user[$i] ?> - <?php echo $game_point_opponent[$i] ?></p>
                </div>
            <?php endfor; ?>
        <?php endif; ?>
    <?php endforeach; ?>

<?php
}
