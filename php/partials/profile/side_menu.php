<?php

namespace partials\profile;

function side_menu($user_id)
{
    ?>

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php the_url('profile?user_id='); ?><?php echo $user_id; ?>">
                    <span data-feather="home"></span>
                    プロフィール
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php the_url('profile/match?user_id='); ?><?php echo $user_id; ?>">
                    <span data-feather="file"></span>
                    試合
                    </a>
                </li>
            </ul>
        </div>
    </nav>

<?php
}
