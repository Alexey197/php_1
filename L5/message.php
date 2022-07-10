<?php

include_once('model/messages.php');

$strId = $_GET['id'] ?? '';
$id = (int)$strId;

$message = messagesOne($id);
$hasMsg = $message !== false;

if($hasMsg){
    include_once('views/v_message.php');
}
else{
    header('HTTP/1.1 404 Not Found');
    include_once('views/errors/v_404.php');
}