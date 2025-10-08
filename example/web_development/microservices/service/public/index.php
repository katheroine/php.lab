<?php

$data = [
    'title' => "Moonlight",
    'body' => "Together, we control the moonlight.",
];

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$json_data = json_encode($data);

echo $json_data;

?>
