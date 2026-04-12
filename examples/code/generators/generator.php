<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function someGenerator(int $value, int $quantity, callable $algorithm): Generator {
    for ($i = 1; $i < $quantity; $i++) {
        $value = $algorithm($value);

        yield $value;
    }
}

$values = someGenerator(0, 10, function(int $value) {
    return $value + 2;
});

print("Information:\n");
var_dump($values);
print('Type: ' . gettype($values) . PHP_EOL . PHP_EOL);

foreach ($values as $value) {
    print($value . ' ');
}

print(PHP_EOL);
