<?php

function someFunction(int $someArgument): int
{
    $result = $someArgument * 2;

    return $result;
}

$someFunctionVariable1 = 'someFunction';
$result = $someFunctionVariable1(3);
print("Some function result: {$result}\n");

$someFunctionVariable2 = someFunction(...);
$result = $someFunctionVariable2(3);
print("Some function result: {$result}\n");

$someFunctionVariable3 = 'someFunction'(...);
$result = $someFunctionVariable2(3);
print("Some function result: {$result}\n");

$someFunctionVariable4 = Closure::fromCallable('someFunction');
$result = $someFunctionVariable4(3);
print("Some function result: {$result}\n");

$otherFunctionVariable1 = function (int $someArgument): int
{
    $result = $someArgument * 3;

    return $result;
};

$result = $otherFunctionVariable1(3);
print("Other function result: {$result}\n");

$otherFunctionVariable2 = Closure::fromCallable($otherFunctionVariable1);
$result = $otherFunctionVariable2(3);
print("Other function result: {$result}\n");
