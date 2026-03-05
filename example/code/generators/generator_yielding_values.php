<?php

function oneValueGenerator()
{
    yield 1;
}

foreach (oneValueGenerator() as $value) {
    print($value . ' ');
}

print(PHP_EOL);

function limitedValuesGenerator()
{
    yield 1;
    yield 3;
    yield 5;
}

foreach (limitedValuesGenerator() as $value) {
    print($value . ' ');
}

print(PHP_EOL);

function unlimitedValuesGenerator()
{
    $value = 0;

    while(true) {
        yield $value++;
    }
}

$anchor = unlimitedValuesGenerator();

print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');

print(PHP_EOL);
