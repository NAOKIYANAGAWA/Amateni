<?php

namespace partials\profile;

function nav_tabs($user_id)
{
    ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php the_url('profile?user_id='); ?><?php echo $user_id; ?>">
            プロフィール
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php the_url('profile/match?user_id='); ?><?php echo $user_id; ?>">
            試合
            </a>
        </li>
    </ul>
<?php
}
