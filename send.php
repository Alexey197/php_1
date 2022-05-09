<?php

$response =[
    'res' => false,
    'error' => ''
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);

    if ($name === '' || $phone === '') {
        $response['error'] = 'Заполните все поля!';
    }
    elseif (mb_strlen($name, 'UTF8') < 2) {
        $response['error'] = 'Имя не короче 2 символов';
    }
    else {
        $dt = date("Y-d-m H:i:s");
        $mailBody = "$dt\n$phone\n$name";
        mail('margadonn@ya.ru', 'New app on site', $mailBody);
        $response['res'] = true;
    }
}

echo json_encode($response);