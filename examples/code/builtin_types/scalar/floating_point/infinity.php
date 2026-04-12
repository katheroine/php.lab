<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$positiveInfinity = 1.9e411;
print("1.9e411: {$positiveInfinity} (" . gettype($positiveInfinity) . ")\n");
print("Is {$positiveInfinity} finite? " . (is_finite($positiveInfinity) ? 'yes' : 'no') . PHP_EOL);
print("Is {$positiveInfinity} inifinite? " . (is_infinite($positiveInfinity) ? 'yes' : 'no') . PHP_EOL);
$bigger = $positiveInfinity + 1;
print("1.9e411 + 1: {$bigger} (" . gettype($bigger) . ")\n");

print PHP_EOL;

$negativeInfinity = -1.9e411;
print "-1.9e411; // {$negativeInfinity} (" . gettype($negativeInfinity) . ")\n";
print("Is {$negativeInfinity} finite? " . (is_finite($negativeInfinity) ? 'yes' : 'no') . PHP_EOL);
print("Is {$negativeInfinity} inifinite? " . (is_infinite($negativeInfinity) ? 'yes' : 'no') . PHP_EOL);
$smaller = $negativeInfinity - 1;
print("-1.9e411 - 1: {$smaller} (" . gettype($smaller) . ")\n");

print PHP_EOL;
