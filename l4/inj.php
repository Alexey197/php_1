<?php

$db = new PDO('mysql:host=localhost;dbname=php1simple', 'root', 'root');
$db->exec('SET NAMES UTF8');

$text = 'Hello All 333!'; //$_POST['text'];
$id = $_GET['id'];

$sql = "UPDATE messages SET text='$text' WHERE id_message=$id";
$db->exec($sql);

