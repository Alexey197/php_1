<?php

include_once('core/db.php');

function messagesAll() : array {
    $sql = "SELECT * FROM messages ORDER BY dt_add DESC";
    $query= dbQuery($sql);
    return $query->fetchAll();
}

function messagesAdd(array $fields) : bool {
    $sql = "INSERT INTO messages (name, text) VALUES (:name, :text)";
    $query = dbQuery($sql, $fields);
    return true;
}

function messagesValidate(array $fields) : array {
    $errors = [];
    $textLen = mb_strlen($fields['text'], 'UTF8');
    
    if (mb_strlen($fields['name'], 'UTF8') < 2) {
        $errors[] = 'Имя не короче 2 символов';
    }

    if ($textLen < 10 || $textLen > 140) {
        $errors[] = 'Текст от 10 до 140 символов';
    }

    return $errors;
}