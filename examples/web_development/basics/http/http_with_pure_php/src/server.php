<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];

const INPUT_STREAM_ACCESS = 'php://input';

const TEXT_DATA_KEY = 'some_text';
const NUMBER_DATA_KEY = 'some_number';

function fetchData(array $source): array
{
    return [
        $source[TEXT_DATA_KEY] ?? '',
        $source[NUMBER_DATA_KEY] ?? 1,
    ];
}

switch($requestMethod) {
    case 'GET':
        list($text, $number) = fetchData($_GET);
        break;
    case 'POST':
        list($text, $number) = fetchData($_POST);
        break;
    case 'PUT':
    case 'PATCH':
    case 'DELETE':
        parse_str(
            file_get_contents(INPUT_STREAM_ACCESS),
            $input
        );
        list($text, $number) = fetchData($input);
        break;
}

$result = str_repeat($text, $number);

$response = [
    'method' => $requestMethod,
    'result' => $result,
];

$content = json_encode($response);

echo $content;
