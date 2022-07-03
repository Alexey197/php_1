<?php

include_once('model/messages.php');

$messages = messagesAll();

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