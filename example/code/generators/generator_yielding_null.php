<?php

function nullGenerator()
{
    while (true) {
        yield;
    }
}

$nulls = nullGenerator();

for ($i = 0; $i < 10; $i++) {
    print($nulls->key() . ': ' . gettype($nulls->current()) . '; ');
    $nulls->next();
}

print(PHP_EOL);
