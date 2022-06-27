<?php

    $db = new PDO('mysql:host=localhost;dbname=php1simple', 'root', 'root');
    $db->exec('SET NAMES UTF8');
    $sql = "INSERT messages (name, text) VALUES (:u, :text)";
    $db->exec($sql);
