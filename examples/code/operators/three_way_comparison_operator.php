<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$a = 1; $b = 2;
print("{$a} <=> {$b} = " . ($a <=> $b) . "\n");
$a = 2; $b = 1;
print("{$a} <=> {$b} = " . ($a <=> $b) . "\n");
$a = 2; $b = 2;
print("{$a} <=> {$b} = " . ($a <=> $b) . "\n");
