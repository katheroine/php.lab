<?php

$someFile = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'file.txt', 'r');

if ($someFile === false) {
    die('Unable to open file');
}

print('Type: ' . get_resource_id($someFile) . PHP_EOL);
print('Type: ' . get_resource_type($someFile) . PHP_EOL);

fclose($someFile);
