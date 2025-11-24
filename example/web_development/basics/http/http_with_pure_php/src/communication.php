<?php

const METHOD_DATA_KEY = 'method';
const TEXT_DATA_KEY = 'some_text';
const NUMBER_DATA_KEY = 'some_number';

global $requestMethod;
global $request;
global $response;
global $errors;

function runCommunication(): void
{
    global $requestMethod;
    global $request;
    global $response;
    global $errors;

    list($requestMethod, $request, $response, $errors) = communicate();
}

function areErrors(): bool
{
    global $errors;

    return (! empty($errors));
}

function errors(): void
{
    global $errors;

    var_dump($errors);
}

function request(): void
{
    global $request;

    var_dump($request);
}

function requestMethod(): void
{
    global $requestMethod;

    echo($requestMethod);
}

function response(): void
{
    global $response;

    var_dump($response);
}

function responseMethod(): void
{
    global $response;

    echo($response->method ?? '');
}

function responseResult(): void
{
    global $response;

    echo($response->result ?? '');
}

function communicate(): array
{
    if (! isset($_REQUEST[METHOD_DATA_KEY])) {
        return [];
    }

    $requestMethod = $_REQUEST[METHOD_DATA_KEY];

    $request = [
        TEXT_DATA_KEY => $_REQUEST[TEXT_DATA_KEY],
        NUMBER_DATA_KEY => $_REQUEST[NUMBER_DATA_KEY],
    ];

    list($response, $errors) = sendRequestAndGetResponse($requestMethod, $request);

    return [
        $requestMethod,
        $request,
        $response,
        $errors,
    ];
}

function sendRequestAndGetResponse(string $requestMethod, array $request): array
{
    $url = 'http://localhost/server.php';

    $query = http_build_query($request);
    $ch = curl_init();

    switch($requestMethod) {
        case 'GET':
            $url = $url . '?' . $query;
            break;
        case 'POST':
            curl_setopt($ch, CURLOPT_POST, true);
            break;
        case 'PUT':
            $headers = [
                'Content-Type: application/x-www-form-urlencoded',
                'Content-Length: ' . strlen($query),
            ];
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestMethod);
            break;
        case 'PATCH':
        case 'DELETE':
            $headers = [
                'X-HTTP-Method-Override: ' . $requestMethod,
            ];
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestMethod);
            break;
    }

    $headers[] = 'My-Very-Own-Client-Data: hello';

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = json_decode(
        curl_exec($ch)
    );

    $errors = curl_error($ch);

    curl_close($ch);

    return [
        $response,
        $errors
    ];
}
