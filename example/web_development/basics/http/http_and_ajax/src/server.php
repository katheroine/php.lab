<?php

$data = [
    'method' => $_SERVER['REQUEST_METHOD'],
];

$json_data = json_encode($data);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo $json_data;
