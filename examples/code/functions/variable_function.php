<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function someFunction()
{
    print("Some function\n");
}

$someVariableFunction = 'someFunction';
$someVariableFunction();

function otherFunction(int $someArgument)
{
    $result = $someArgument * 3;

    return $result;
}

$otherVariableFunction = 'otherFunction';
$result = $otherVariableFunction(3);
print("Other function result: {$result}\n");
