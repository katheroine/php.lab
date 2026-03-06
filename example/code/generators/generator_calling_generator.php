<?php

function oddValuesGenerator(int $number)
{
    $value = -1;

    for($i = 0; $i < $number; $i++) {
        $value += 2;
        yield $value;
    }
}

function evenValueGenerator(int $number)
{
    $value = 0;

    for($i = 0; $i < $number; $i++) {
        $value += 2;
        yield $value;
    }
}

function someGenerator(int $number)
{
    $odds = oddValuesGenerator($number);
    $evens = evenValueGenerator($number);

    $number *= 2;

    for ($i = 1; $i <= $number; $i++) {
        if ($i % 2) {
            yield $odds->current();
            $odds->next();
        } else {
            yield $evens->current();
            $evens->next();
        }
    }
}

foreach (someGenerator(3) as $value) {
    print($value . ' ');
}

print(PHP_EOL);
