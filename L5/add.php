<?php

include_once('model/messages.php');
include_once('core/arr.php');

    $cats = [
        ['id_cat' => '1', 'title' => 'Phones'],
        ['id_cat' => '2', 'title' => 'Notebooks']
    ];
    $fields = ['name' => '', 'text' => '', 'id_cat' => 0];
    $err = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields = extractFields($_POST, ['name', 'text', 'id_cat']);
//        $fields['name'] = trim($_POST['name']);
//        $fields['text'] = trim($_POST['text']);
//        $fields['id_cat'] = (int)($_POST['id_cat']);

        if ($fields['name'] === '' || $fields['text'] === '') {
            $err = 'Заполните все поля!';
        }
        else {
            messagesAdd($fields);
            header("Location: index.php");
            exit();
        }
    }

    include("views/v_add.php");

