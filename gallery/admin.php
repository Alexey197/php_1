<?php

include_once('model/gallery.php');

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
    elseif (!checkImageName($file['name'])) {
            $err = 'Только jpeg';
    }
    else {
        copy($file['tmp_name'], 'images/' . mt_rand(1000, 100000) . '.jpeg');
        $isSend = true;
    }
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