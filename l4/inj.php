<?php

$db = new PDO('mysql:host=localhost;dbname=php1simple', 'root', 'root');
$db->exec('SET NAMES UTF8');


//?id=2&text=HelloAdmin',status='1
$text = $db->quote($_GET['text']);
var_dump($_GET['text']);
var_dump($text);
$id = (int)($_GET['id'] ?? '');

$sql = "UPDATE messages SET text=$text WHERE id_message=$id";
$db->exec($sql);

