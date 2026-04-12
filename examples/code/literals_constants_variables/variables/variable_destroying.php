<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$number = 15;
$text = "Hello, there!";

print("Does number exist: " . (isset($number) ? 'yes' : 'no') . "\nDoes number exist: " . (isset($text) ? 'yes' : 'no') . "\n\n");

unset($number);
unset($text);

print("Does number exist: " . (isset($number) ? 'yes' : 'no') . "\nDoes number exist: " . (isset($text) ? 'yes' : 'no') . "\n\n");
