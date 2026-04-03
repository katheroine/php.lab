<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someNothing = null;

print("Information:\n");
var_dump($someNothing);
print('Type: ' . gettype($someNothing) . PHP_EOL);
print("As string: {$someNothing}\n");
