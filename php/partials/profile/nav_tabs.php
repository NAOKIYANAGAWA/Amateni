<?php

namespace partials\profile;

function nav_tabs($user_id)
{
    ;
    $active_nav = 'active'; ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php echo get_active_nab_tab('profile'); ?>" aria-current="page" href="<?php the_url('profile?user_id='); ?><?php echo $user_id; ?>">
            プロフィール
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo get_active_nab_tab('profile/match'); ?>" href="<?php the_url('profile/match?user_id='); ?><?php echo $user_id; ?>">
            試合
            </a>
        </li>
    </ul>
<?php
}
