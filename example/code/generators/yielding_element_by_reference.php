<?php

function &generatorYieldingByValue(int $value, int $quantity): Generator
{
    for ($i = 1; $i < $quantity; $i++) {
        $value *= 2;

        yield $value;
    }
}

foreach (generatorYieldingByValue(1, 6) as &$value) {
    print($value . ' ');
    $value += 1;
}

print(PHP_EOL);
