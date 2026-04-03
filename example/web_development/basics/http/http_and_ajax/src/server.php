<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$data = [
    'method' => $_SERVER['REQUEST_METHOD'],
];

$json_data = json_encode($data);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo $json_data;
