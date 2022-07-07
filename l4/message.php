<?php

include_once('model/messages.php');
$strId = $_GET['id'] ?? '';

$id = (int)$strId;
$message = messagesOne($id);
$hasMsg = $message !== false;

?>

<div>
  <h1>Chat</h1>
  <a href="index.php">index</a>
  <div>
    <?=$hasMsg ? 1 : 0 ?>
  </div>

<!--    --><?// if ($hasMsg): ?>
<!--      <div>-->
<!--        <strong>--><?//=$message['name']?><!--</strong>-->
<!--        <em>--><?//=$message['dt_add']?><!--</em>-->
<!--        <div>--><?//=$message['text']?><!--</div>-->
<!--      </div>-->
<!---->
<!--    --><?// else: ?>
<!--      <p>Article not found</p>-->
<!--    --><?// endif; ?>
</div>