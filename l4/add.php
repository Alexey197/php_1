<?php

include_once('model/db.php');
$db = dbInstance();

    $fields = ['name' => '', 'text' => ''];
    $err = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields['name'] = trim($_POST['name']);
        $fields['text'] = trim($_POST['text']);

        if ($fields['name'] === '' || $fields['text'] === '') {
            $err = 'Заполните все поля!';
        }
        else {
            $sql = "INSERT messages (name, text) VALUES (:name, :text)";
            dbQuery($sql, $fields);
            header('Location: index.php');
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

