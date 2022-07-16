<?php

include_once('model/messages.php');

// checkID
$strId = $_GET['id'] ?? '';
$id = (int)$strId;

$message = messagesOne($id);
$hasMsg = $message !== false; // $message !== null;

if($hasMsg){
    $pageTitle = $message['name'];
    $pageContent = template('v_message', [
        'message' => $message
    ]);
}
else{
	header('HTTP/1.1 404 Not Found');
    $pageContent = template('errors/v_404');
}
