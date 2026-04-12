<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "This iterator wrapper allows the conversion of anything that is Traversable into an Iterator.
// It is important to understand that most classes that do not implement
// Iterators have reasons as most likely they do not allow the full Iterator feature set.
// If so, techniques should be provided to prevent misuse, otherwise expect exceptions or fatal errors."
// -- https://www.php.net/manual/en/class.iteratoriterator.php


$someIterator = new IteratorIterator(
    new ArrayIterator(['rose', 'tulip', 'peony'])
);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);

$innerIterator = $someIterator->getInnerIterator();

for ($innerIterator->rewind(); $innerIterator->valid(); $innerIterator->next()) {
    print('[' . $innerIterator->key() . ']:' . $innerIterator->current() . PHP_EOL);
}

print(PHP_EOL);
