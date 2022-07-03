<?php

include_once('model/db.php');

$db1 = dbInstance();
$res1 = $db1->query('SELECT CONNECTION_ID()')->fetch();
var_dump($res1);

$db2 = dbInstance();
$res2 = $db2->query('SELECT CONNECTION_ID()')->fetch();
var_dump($res2);


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
        <div>
            <?=$message['text']?>
        </div>
      <hr>
    </div>
    <? endforeach; ?>

</div>