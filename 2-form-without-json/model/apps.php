<?php


function getApps(): array{
    $lines = file('db/apps.txt');
    $apps = [];

    foreach ($lines as $line) {
        $apps[] = appStrToArr($line);
    }
    return $apps;
}

function appStrToArr($str): array{
    $str = rtrim($str);
    $part = explode(';', $str);
    return ['dt' => $part[0], 'name' => $part[1], 'phone' => $part[2]];
}

function addApp(string $name, string $phone): bool{
    $dt = date("Y-d-m H:i:s");
    $app = "$dt;$name;$phone\n";
    file_put_contents('db/apps.txt', $app, FILE_APPEND);
    return true;
}
