<?php

$someFunction = function () {
    print("Some function\n");
};

$someFunction();

$otherFunction = function (int $someArgument): int {
    $result = $someArgument * 3;

    return $result;
};

$result = $otherFunction(3);
print("Other function result: {$result}\n");
