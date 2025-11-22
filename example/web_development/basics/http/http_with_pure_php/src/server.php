<?php

header('Content-Type: application/json');
header('My-Very-Own-Server-Data: hi');

$requestMethod = $_SERVER['REQUEST_METHOD'];

function buildResult(string $text, int $number): string
{
    return str_repeat($text, $number);
}

switch($requestMethod) {
    case 'GET':
        $text = $_GET['some_text'] ?? '';
        $number = $_GET['some_number'] ?? 1;
        break;
    case 'POST':
        $text = $_POST['some_text'] ?? '';
        $number = $_POST['some_number'] ?? 1;
        break;
    case 'PUT':
    case 'PATCH':
    case 'DELETE':
        parse_str(file_get_contents('php://input'), $input);
        $text = $input['some_text'] ?? '';
        $number = $input['some_number'] ?? 1;
        break;
}

$result = buildResult($text, $number);

$response = [
    'method' => $_SERVER['REQUEST_METHOD'],
    'request_headers' => getallheaders(),
    'response_headers' => headers_list(),
    'result' => $result,
];

$content = json_encode($response);

echo $content;
