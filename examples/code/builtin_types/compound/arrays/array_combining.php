<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someKeys = [1, 'value', 'fruit'];
$someValues = [32, 3.14, 'pear'];

$someArray = array_combine($someKeys, $someValues);

print("Some array:\n\n");
print_r($someArray);
print(PHP_EOL);
