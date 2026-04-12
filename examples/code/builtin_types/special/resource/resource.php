<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$filePath = __DIR__ . DIRECTORY_SEPARATOR . 'file.txt';
$someFile = fopen($filePath, 'r');

if ($someFile === false) {
    die('Unable to open file');
}

print("Information:\n");
var_dump($someFile);
print('Type: ' . gettype($someFile) . PHP_EOL);
print("As string: {$someFile}\n\n");

$content = fread($someFile, filesize($filePath));
print("Content: {$content}\n");

fclose($someFile);

print("Information:\n");
var_dump($someFile);
print('Type: ' . gettype($someFile) . PHP_EOL);
print("As string: {$someFile}\n\n");
