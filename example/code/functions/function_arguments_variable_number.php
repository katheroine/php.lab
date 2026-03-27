<?php

function functionWithVariableNumberOfArguments(int ...$arguments): int
{
    $product = 1;

    foreach ($arguments as $argument) {
        $product *= $argument;
    }

    return $product;
}

$result = functionWithVariableNumberOfArguments(1, 2, 3);
print("Result of calling function with 3 arguments: {$result}\n");

$result = functionWithVariableNumberOfArguments(1, 2, 3, 4, 5);
print("Result of calling function with 5 arguments: {$result}\n");
