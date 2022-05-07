<?php

    $isSend = false;
    $err = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = trim($_POST['name']);
      $phone = trim($_POST['phone']);
      $dt = date("Y-d-m H:i:s");

      if ($name === '' || $phone === '') {
        $err = 'Заполните все поля!';
      }
      elseif (mb_strlen($name, 'UTF8') < 2) {
          $err = 'Имя не короче 2 символов';
      }
      else {
          $mailBody = "$dt\n$phone\n$name";
          mail('margadonn@ya.ru', 'New app on site', $mailBody);
          $isSend = true;
      }
    }
    else {
        $name = '';
        $phone = '';
    }

    echo $_SERVER['REQUEST_METHOD'];
    echo '<pre>';
    print_r($_POST);
    echo '<pre>';
?>
<div class="form">
  <? if ($isSend): ?>
  <p>Your app is done!</p>
  <? else: ?>
  <form method="post">
    Name:<br>
    <input type="text" name="name" value="<?=$name?>">
    Phone:<br>
    <input type="text" name="phone" value="<?=$phone?>">
    <button>Send</button>
    <p><?=$err?></p>
  </form>
  <? endif; ?>
</div>
