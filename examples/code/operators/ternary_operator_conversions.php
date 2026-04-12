<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$result = false ? "yes" : "no";
print("false: {$result}\n");

$result = true ? "yes" : "no";
print("true: {$result}\n");

$result = 0 ? "yes" : "no";
print("0: {$result}\n");

$result = 2 ? "yes" : "no";
print("2: {$result}\n");

$result = "0" ? "yes" : "no";
print("\"0\": {$result}\n");

$result = "2" ? "yes" : "no";
print("\"2\": {$result}\n");

$result = "a" ? "yes" : "no";
print("\"a\": {$result}\n");

$result = null ? "yes" : "no";
print("null: {$result}\n");


