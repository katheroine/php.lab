<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someVariable = 10.5;
$otherVariable = 'binded variable';

$someFunction = function () use ($someVariable) {
    print("Some function with binded variable: {$someVariable} \n");
};

$someFunction();

$otherFunction = function (int $someArgument) use ($someVariable, $otherVariable): int {
    $result = $someArgument * 3;
    print("Some function with binded variables: {$someVariable}, {$otherVariable} \n");

    return $result;
};

$result = $otherFunction(3);
print("Other function result: {$result}\n");
