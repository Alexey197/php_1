<?php

include_once('model/messages.php');
include_once('model/db.php');

    $fields = ['name' => '', 'text' => ''];
    $err = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields['name'] = trim($_POST['name']);
        $fields['text'] = trim($_POST['text']);

        if ($fields['name'] === '' || $fields['text'] === '') {
            $err = 'Заполните все поля!';
        }
        else {
            messagesAdd($fields);
            $id = dbLastId();
            header("Location: message.php?id=$id");
            exit();
        }
    }

    ?>
    <div class="form">
      <form method="post">
        Name:<br>
        <input type="text" name="name" value="<?=$fields['name']?>"><br>
        Text:<br>
        <textarea name="text"><?=$fields['text']?></textarea><br>
        <button>Send</button>
        <p><?=$err?></p>
      </form>
    </div>

