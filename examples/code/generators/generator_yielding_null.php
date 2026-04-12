<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function nullGenerator()
{
    while(true) {
        yield;
    }
}

$nulls = nullGenerator();

for ($i = 0; $i < 10; $i++) {
    print($nulls->key() . ': ' . gettype($nulls->current()) . '; ');
    $nulls->next();
}

print(PHP_EOL);
