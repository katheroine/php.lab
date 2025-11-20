<?php

$response = [
    'method' => $_SERVER['REQUEST_METHOD'],
    'result' => str_repeat($_REQUEST['some_text'], $_REQUEST['some_number']),
];

$json_data = json_encode($response);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo $json_data;
