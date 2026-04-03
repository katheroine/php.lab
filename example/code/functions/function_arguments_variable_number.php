<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function functionWithVariableNumberOfArguments(int ...$arguments): int
{
    $product = 1;

    foreach($arguments as $argument){
        $product *= $argument;
    }

    return $product;
}

$result = functionWithVariableNumberOfArguments(1, 2, 3);
print("Result of calling function with 3 arguments: {$result}\n");

$result = functionWithVariableNumberOfArguments(1, 2, 3, 4, 5);
print("Result of calling function with 5 arguments: {$result}\n");
