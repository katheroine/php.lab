<?php

function oddValuesGenerator(int $number)
{
    $value = -1;

    for($i = 0; $i < $number; $i++) {
        $value += 2;
        yield $value => $value;
    }
}

function evenValueGenerator(int $number)
{
    $value = 0;

    for($i = 0; $i < $number; $i++) {
        $value += 2;
        yield $value => $value;
    }
}

function someGenerator(int $number)
{
    yield 0 => 0;
    yield from oddValuesGenerator($number);
    yield from evenValueGenerator($number);
}

foreach (someGenerator(3) as $key => $value) {
    print($key . ': ' . $value . '; ');
}

print(PHP_EOL);
