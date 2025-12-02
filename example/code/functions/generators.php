<?php

function someGenerator(int $value, int $quantity, callable $algorithm): Generator {
    foreach (range(1, $quantity) as $i) {
        $nextValue = $algorithm($value);
        yield $nextValue;
        $value = $nextValue;
    }
}

$values = someGenerator(0, 10, function(int $value) {
    return $value + 1;
});

foreach ($values as $value) {
    print($value . ' ');
}

print(PHP_EOL);
