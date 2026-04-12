<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function someFunctionTakingFunction(mixed $value, int $quantity, callable $algorithm): mixed
{
    foreach (range(1, $quantity) as $i) {
        $value = $algorithm($value);
    }

    return $value;
}

$result = someFunctionTakingFunction(2, 3, function (mixed $value): mixed {
    return $value + 5;
});

print($result . PHP_EOL);

function someFunctionReturningFunction(): callable
{
    return function(string $name) {
        print("Hello, {$name}!\n");
    };
}

$function = someFunctionReturningFunction();
$result = $function("Kate");

print($result . PHP_EOL);
