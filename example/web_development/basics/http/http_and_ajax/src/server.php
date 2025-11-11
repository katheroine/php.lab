<?php

$data = [
    'method' => $_SERVER['REQUEST_METHOD'],
];

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$json_data = json_encode($data);

echo $json_data;
