<?php

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
