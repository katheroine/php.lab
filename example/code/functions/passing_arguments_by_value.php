<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$value = 5;

function functionReceivingValueByValue($argument)
{
    $argument *= 2;

    return $argument;
}

print("Before: {$value}\n");
$result = functionReceivingValueByValue($value);
print("Result: {$result}\n");
print("After: {$value}\n");
