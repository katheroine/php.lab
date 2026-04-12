<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someText = 'Hi, there!';
$otherText = "Hello.";

print("Information:\n");
var_dump($someText);
print('Type: ' . gettype($someText) . PHP_EOL);

print("Information:\n");
var_dump($otherText);
print('Type: ' . gettype($otherText) . PHP_EOL);
