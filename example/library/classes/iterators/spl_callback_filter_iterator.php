<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// -- https://www.php.net/manual/en/class.callbackfilteriterator.php

$someIterator = new CallbackFilterIterator(
    new ArrayIterator([
        'rose',
        'tulip',
        'peony',
        'violet',
        'orchid',
        'daisy'
    ]),
    function ($current, $key, $iterator) {
        if (in_array($current, ['rose', 'violet', 'orchid'])) {
            return false;
        }

        return true;
    }
);

function display(Iterator $array) {
    foreach ($array as $key => $value) {
        print("[${key}]: ${value}\n");
    }

    print(PHP_EOL);
}

display($someIterator);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);

for ($someIterator->rewind(); $someIterator->accept(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);

$innerIterator = $someIterator->getInnerIterator();

for ($innerIterator->rewind(); $innerIterator->valid(); $innerIterator->next()) {
    print('[' . $innerIterator->key() . ']:' . $innerIterator->current() . PHP_EOL);
}

print(PHP_EOL);
