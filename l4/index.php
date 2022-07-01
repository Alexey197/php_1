<?php

include_once('model/db.php');
$db = dbInstance();

$sql = "SELECT * FROM messages ORDER BY dt_add DESC";
$query= dbQuery($sql);

$messages = $query->fetchAll();
?>

<div>
    <h1>Chat</h1>
    <a href="add.php">add</a>
    <? foreach ($messages as $message): ?>
    <div>
        <strong><?=$message['name']?></strong>
        <em><?=$message['dt_add']?></em>
        <div><?=$message['text']?></div>
      <hr>
    </div>
    <? endforeach; ?>
</div>

