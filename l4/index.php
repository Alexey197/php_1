<?php

$db = new PDO('mysql:host=localhost;dbname=php1simple', 'root', 'root', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
$db->exec('SET NAMES UTF8');

$sql = "SELECT * FROM messages ORDER BY dt_add DESC";

$query = $db->prepare($sql);
$query->execute();
$errInfo = $query->errorInfo();

if($errInfo[0] !== PDO::ERR_NONE){
    echo $errInfo[2];
    exit();
}

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

