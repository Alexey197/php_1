<?php

$isSend = false;
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];

    if ($file['name'] === '') {
        $err = 'Файл не выбран';
    }
    elseif ($file['size'] === '') {
        $err = 'Файл слишком большой';
    }
    elseif (!preg_match('/.*\.jpeg$/', $file['name'])) {
            $err = 'Только jpeg';
    }
    else {
        copy($file['tmp_name'], 'images/' . mt_rand(1000, 100000) . '.jpeg');
//        var_dump($file);
        $isSend = true;
    }
} else {
    $name = '';
    $phone = '';
}

?>
<div class="form">
    <? if ($isSend): ?>
        <p>Your image is done!</p>
    <? else: ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button>Send</button>
            <p><?= $err ?></p>
        </form>
    <? endif; ?>
</div>