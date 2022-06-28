<?php

    $db = new PDO('mysql:host=localhost;dbname=php1simple', 'root', 'root');
    $db->exec('SET NAMES UTF8');


    $sql = "INSERT messages (name, text, status) VALUES (:name, :text, :status)";
    $query = $db->prepare($sql);

    $name = 'Admin';
    $text = 'Delete all!';
    $status = 1;

    $query->bindParam(':name', $name);
    $query->bindParam(':text', $text);
    $query->bindParam(':status', $status);
    $query->execute();
