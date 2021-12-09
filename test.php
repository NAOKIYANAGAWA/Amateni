<?php

    if (get_param('opponent_id', null, false) === 'opponent') {
        'opponent';
        return;
    }

    return 'nothing';
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>MySQL接続確認</title>
  </head>
  <body>
    <h1>MySQL接続確認</h1>
    <p><?php echo $msg; ?></p>
  </body>
</html>