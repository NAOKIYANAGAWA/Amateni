<?php
namespace view\top;

function index($rank_info)
{
    ?>

    <?php \partials\header(); ?>

    <div class="text-center my-5">
        <h2>ランキング</h2>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th	scope="col">#</th>
                    <th	scope="col">プレーヤー名</th>
                    <th	scope="col">勝利数</th>
                    <th	scope="col">ポイント</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rank_info as $key=>$value): ?>
                <tr>
                    <th	scope="row"><?php echo $key+1; ?></th>
                    <td>
                        <a href="<?php the_url('profile/match?user_id='); ?><?php echo $value['user_id']; ?>"><?php echo $value['nickname']; ?></a>
                    </td>
                    <td><?php echo $value['wins']; ?></td>
                    <td><?php echo $value['points']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php \partials\footer(); ?>

    <?php
}
