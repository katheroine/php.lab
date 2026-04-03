<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Generator objects are returned from generators."
// -- https://www.php.net/manual/en/class.generator.php

function someGenerator(int $value, int $quantity, callable $algorithm): Generator {
    foreach (range(1, $quantity) as $i) {
        $nextValue = $algorithm($value);
        $result = yield $nextValue;
        $value = $nextValue;
    }

    return "Quantity: {$quantity}";
}

$values = someGenerator(0, 10, function(int $value) {
    return $value + 1;
});

var_dump($values);

print(PHP_EOL);

for ($values->rewind(); $values->valid(); $values->next()) {
    print('[' . $values->key() . ']: ' . $values->current() . PHP_EOL);
}

print(PHP_EOL);

print($values->getReturn() . PHP_EOL . PHP_EOL);

function otherGenerator(int $value): Generator {
    while (true) {
        $input = yield;
        print('<' . $value + $input . ">\n");
    }
}

$printer = otherGenerator(3);

$printer->send(2);
$printer->send(3);
$printer->send(5);
