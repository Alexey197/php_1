<?php

include_once('model/messages.php');

// checkID
$strId = $_GET['id'] ?? '';
$id = (int)$strId;

$message = messagesOne($id);
$hasMsg = $message !== false; // $message !== null;

if($hasMsg){
    $menu = template('messages/v_message_menu');
    $content = template('messages/v_message', [
        'message' => $message
    ]);

    $pageTitle = $message['name'];
    $pageContent = template('base/v_con2col', [
        'left' => $menu,
        'content' => $content,
        'title' => 'One message'
    ]);
}
else{
	header('HTTP/1.1 404 Not Found');
    $pageContent = template('errors/v_404');
}
