<?php

function functionWithDefaultArgument(int $argument = 3): int
{
    return $argument * 2;
}

$result = functionWithDefaultArgument();
print("Result of calling function with default argument: {$result}\n");

$result = functionWithDefaultArgument(4);
print("Result of calling function with provided argument: {$result}\n");
