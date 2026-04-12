<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$value = 3;

$closureBindingByValue = function () use ($value) {
    $value *= 3;

    return $value;
};

print("Binding by value\n\n");
print("Before: {$value}\n");
$result = $closureBindingByValue();
print("Result: {$result}\n");
print("After: {$value}\n\n");
