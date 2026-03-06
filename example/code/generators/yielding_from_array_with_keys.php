<?php

global $oddValues, $evenValues;

$oddValues = ['one' => 1, 'three' => 3, 'five' => 5];
$evenValues = ['two' => 2, 'four' => 4, 'six' => 6];

function someGenerator()
{
    global $oddValues, $evenValues;

    yield from [0 => 0];
    yield from $oddValues;
    yield from $evenValues;
}

foreach (someGenerator() as $key => $value) {
    print($key . ': ' . $value . '; ');
}

print(PHP_EOL);
