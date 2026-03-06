<?php

global $oddValues, $evenValues;

$oddValues = [1, 3, 5];
$evenValues = [2, 4, 6];

function someGenerator()
{
    global $oddValues, $evenValues;

    yield from [0];
    yield from $oddValues;
    yield from $evenValues;
}

foreach (someGenerator() as $value) {
    print($value . ' ');
}

print(PHP_EOL);
