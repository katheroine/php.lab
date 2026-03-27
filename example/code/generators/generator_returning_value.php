<?php

function someGenerator(int $number): Generator
{
    $result = 0;

    for ($i = 0; $i < $number; $i++) {
        $result += $i;
        yield $i;
    }

    return $result;
}

$values = someGenerator(5);

foreach ($values as $value) {
    print($value . ' ');
}

print(PHP_EOL);

$result = $values->getReturn();
print($result . PHP_EOL);
