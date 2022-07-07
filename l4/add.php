<?php

include_once('model/messages.php');
include_once('model/db.php');

    $cats = [
        ['id_cat' => '1', 'title' => 'Phones'],
        ['id_cat' => '2', 'title' => 'Notebooks']
    ];
    $fields = ['name' => '', 'text' => '', 'id_cat' => 0];
    $err = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields['name'] = trim($_POST['name']);
        $fields['text'] = trim($_POST['text']);
        $fields['id_cat'] = (int)($_POST['id_cat']);

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
        Category:<br>
        <select name="id_cat">
        <? foreach($cats as $cat): ?>
          <option value="<?=$cat['id_cat']?>"
              <?=($cat['id_cat'] == $fields['id_cat'] ? 'selected' : '')?>
          >
              <?=$cat['title']?>
          </option>
        <? endforeach; ?>
        </select><br>
        Name:<br>
        <input type="text" name="name" value="<?=$fields['name']?>"><br>
        Text:<br>
        <textarea name="text"><?=$fields['text']?></textarea><br>
        <button>Send</button>
        <p><?=$err?></p>
      </form>
    </div>

