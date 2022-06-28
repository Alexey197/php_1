<?php

    $db = new PDO('mysql:host=localhost;dbname=php1simple', 'root', 'root');
    $db->exec('SET NAMES UTF8');


    $sql = "INSERT messages (name, text, status) VALUES (:name, :text, :status)";
    $query = $db->prepare($sql);

    $params = [
        'name' => 'Admin',
        'text' => 'Delete all!',
        'status' => 1
    ];

    $query->execute($params);
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }

    echo 'All done!';

//    $name = 'Admin';
//    $text = 'Delete all!';
//    $status = 1;
//
//    $query->bindParam(':name', $name);
//    $query->bindParam(':text', $text);
//    $query->bindParam(':status', $status);
//    $query->execute();
