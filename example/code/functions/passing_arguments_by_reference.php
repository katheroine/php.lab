<?php

$value = 20;

function functionReceivingValueByReference(&$argument)
{
    $argument /= 2;

    return $argument;
}

print("Before: {$value}\n");
$result = functionReceivingValueByReference($value);
print("Result: {$result}\n");
print("After: {$value}\n");
