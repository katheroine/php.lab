<?php

header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];

const TEXT_DATA_KEY = 'some_text';
const NUMBER_DATA_KEY = 'some_number';

switch($requestMethod) {
    case 'GET':
        $text = $_GET[TEXT_DATA_KEY] ?? '';
        $number = $_GET[NUMBER_DATA_KEY] ?? 1;
        break;
    case 'POST':
        $text = $_POST[TEXT_DATA_KEY] ?? '';
        $number = $_POST[NUMBER_DATA_KEY] ?? 1;
        break;
    case 'PUT':
    case 'PATCH':
    case 'DELETE':
        parse_str(file_get_contents('php://input'), $input);
        $text = $input[TEXT_DATA_KEY] ?? '';
        $number = $input[NUMBER_DATA_KEY] ?? 1;
        break;
}

$result = str_repeat($text, $number);

$response = [
    'method' => $requestMethod,
    'result' => $result,
];

$content = json_encode($response);

echo $content;
