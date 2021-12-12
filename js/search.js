collapse_serch_menu();
function collapse_serch_menu() {
    const $form = document.querySelector('.navbar-toggler');

    if (!$form) {
        return;
    }

        $form.addEventListener('click', function () {

            const $form = document.querySelector('.navbar-collapse');
            const $target = document.querySelector('.collapse');

            if ($target) {
                $form.classList.add('collapse.show');
                $form.classList.remove('collapse');
            } else {
                $form.classList.add('collapse');
                $form.classList.remove('collapse.show');
            }
            console.log($form);
        });
}