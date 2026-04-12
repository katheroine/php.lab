<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someFile = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'file.txt', 'r');

if ($someFile === false) {
    die('Unable to open file');
}

print('Type: ' . get_resource_id($someFile) . PHP_EOL);
print('Type: ' . get_resource_type($someFile) . PHP_EOL);

fclose($someFile);
