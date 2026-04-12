<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someValue = 5;
$otherValue = "pumpkin";

print("\$someValue: {$someValue}\n");
print("\$otherValue: {$otherValue}\n");

print(PHP_EOL);

$otherValue = $someValue;
$someValue = $someValue + 3;

print("\$someValue: {$someValue}\n");
print("\$otherValue: {$otherValue}\n");

print(PHP_EOL);
