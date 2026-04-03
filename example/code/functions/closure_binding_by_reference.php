<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$value = 30;

$closureBindingByReference = function () use (&$value) {
    $value /= 3;

    return $value;
};

print("Binding by reference\n\n");
print("Before: {$value}\n");
$result = $closureBindingByReference();
print("Result: {$result}\n");
print("After: {$value}\n\n");
