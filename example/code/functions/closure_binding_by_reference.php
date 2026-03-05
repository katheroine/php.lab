<?php

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
