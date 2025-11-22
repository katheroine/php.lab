<?php

function communicate(): array
{
    $request = [];
    $response= [];

    if (isset($_REQUEST['method'])) {
        $requestMethod = $_REQUEST['method'];

        $request = [
            'some_text' => $_REQUEST['some_text'],
            'some_number' => $_REQUEST['some_number'],
        ];

        $url = 'http://localhost/server.php';

        switch($requestMethod) {
            case 'GET':
                $query = http_build_query($request);
                $queryUrl = $url . '?' . $query;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $queryUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = json_decode(
                    curl_exec($ch)
                );
                curl_close($ch);
                break;
            case 'POST':
                $query = http_build_query($request);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = json_decode(
                    curl_exec($ch)
                );
                curl_close($ch);
                break;
            case 'PUT':
                $query = http_build_query($request);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/x-www-form-urlencoded',
                    'Content-Length: ' . strlen($query),
                    'My-Very-Own-Client-Data: hello',
                ]);
                $response = json_decode(
                    curl_exec($ch)
                );
                curl_close($ch);
                break;
            case 'PATCH':
                $headers = [
                    'X-HTTP-Method-Override: PATCH',
                ];
                $query = http_build_query($request);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = json_decode(
                    curl_exec($ch)
                );
                curl_close($ch);
                break;
            case 'DELETE':
                $headers = [
                    'X-HTTP-Method-Override: DELETE',
                ];
                $query = http_build_query($request);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = json_decode(
                    curl_exec($ch)
                );
                curl_close($ch);
                break;
        }

        // var_dump(curl_errno($ch));
        // if(curl_error($ch)) {
        //     var_dump(curl_error($ch));
        // }
    }

    return [
        $requestMethod,
        $request,
        $response,
    ];
}
