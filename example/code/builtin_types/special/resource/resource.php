<?php

$someFile = fopen('file.txt', 'r');

if ($someFile === false) {
    die('Unable to open file');
}

print("Information:\n");
var_dump($someFile);
print('Type: ' . gettype($someFile) . PHP_EOL);
print("As string: {$someFile}\n\n");

$content = fread($someFile, filesize('file.txt'));
print("Content: {$content}\n");

fclose($someFile);

print("Information:\n");
var_dump($someFile);
print('Type: ' . gettype($someFile) . PHP_EOL);
print("As string: {$someFile}\n\n");
