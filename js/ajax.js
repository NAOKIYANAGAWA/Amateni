auto_complate_user();
function auto_complate_user() {
    var xhr = new XMLHttpRequest();

    const $input = document.querySelector('#opponent_id');

    if (!$input) {
        return;
    }

    $input.addEventListener('input', function () {
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                $form = document.querySelector('.validate-form');
                $submitBtn = $form.querySelector('[type="submit"]');
                if (xhr.responseText) {
                    document.querySelector('#opponent_id').classList.add('is-valid');
                    document.querySelector('#opponent_id').classList.remove('is-invalid');
                    $submitBtn.removeAttribute('disabled');
                } else {
                    document.querySelector('#opponent_id').classList.add('is-invalid');
                    document.querySelector('#opponent_id').classList.remove('is-valid');
                    $submitBtn.setAttribute('disabled', true);
                }
            }
        }
        $opponent_id = document.querySelector('#opponent_id').value;
        xhr.open('GET', 'http://localhost/amateni/ajax.php?opponent_id='+$opponent_id);
        xhr.send();
    });
}

send_message();
function send_message() {

    const $input = document.querySelector('#send_message_btn');

    if (!$input) {
        return;
    }
    //スクロールを最下位にセット
    let target = document.querySelector('.chat-history-inner');
    target.scrollIntoView(false);

    var xhr = new XMLHttpRequest();

    $input.addEventListener('click', function () {
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                window.location.reload();
                if (xhr.responseText) {
                }
            }
        }

        $chat_room_id = document.querySelector('#chat_room_id').value;
        $user_id = document.querySelector('#user_id').value;
        $chat_message = document.querySelector('#chat_message').value;

        xhr.open('POST', 'http://localhost/amateni/ajax.php');
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
        xhr.send( 'chat_room_id='+ $chat_room_id + '&user_id='+ $user_id + '&message=' + $chat_message );
    });
}