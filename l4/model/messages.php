<?php

include_once('model/db.php');

function messagesAll() : array {
    $sql = "SELECT * FROM messages ORDER BY dt_add DESC";
    $query= dbQuery($sql);
    return $query->fetchAll();
}

function messagesAdd(array $fields) : bool {
    $sql = "INSERT messages (name, text) VALUES (:name, :text)";
    dbQuery($sql, $fields);
    return true;
}

//declare(strict_types=1)
/*
function messagesOne(int $id) : ?array{
    $sql = "SELECT * FROM messages WHERE id_message=:id";
    $query = dbQuery($sql, ['id' => $id]);
    $article = $query->fetch();
    return is_array($article) ? $article : null;
}
*/

function messagesOne(int $id){
    $sql = "SELECT * FROM messages WHERE id_message=:id";
    $query = dbQuery($sql, ['id' => $id]);
    return $query->fetch();
}