<?php

include_once('core/db.php');

function messagesAll() : array {
    $sql = "SELECT * FROM messages ORDER BY dt_add DESC";
    $query= dbQuery($sql);
    return $query->fetchAll();
}

function messagesAdd(array $fields) : bool {
    $sql = "INSERT INTO messages (name, text, id_cat) VALUES (:name, :text, :id_cat)";
    $query = dbQuery($sql, $fields);
    return true;
}