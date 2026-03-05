<?php

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
