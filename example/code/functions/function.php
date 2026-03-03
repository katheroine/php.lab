<?php

function someFunction()
{
    print("Some function\n");
}

someFunction();

function otherFunction(int $someArgument)
{
    $result = $someArgument * 3;

    return $result;
}

$result = otherFunction(3);
print("Other function result: {$result}\n");
