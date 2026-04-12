<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someObject = (object) [
    'someField' => 'some value',
    'otherField' => 1024
];

var_dump(isset($someObject));
var_dump($someObject);
print(PHP_EOL);

unset($someObject);

var_dump(isset($someObject));
print(PHP_EOL);
