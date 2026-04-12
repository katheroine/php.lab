<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function generatorYieldingByValue(int $value, int $quantity): Generator {
    for ($i = 1; $i < $quantity; $i++) {
        $value *= 2;

        yield $value;
    }
}

foreach (generatorYieldingByValue(1, 6) as $value) {
    print($value . ' ');
    $value += 1;
}

print(PHP_EOL);
