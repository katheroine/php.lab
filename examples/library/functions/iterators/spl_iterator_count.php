<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Count the elements in an iterator"
// -- https://www.php.net/manual/en/function.iterator-count.php

$someArray = [1, 2, 3, 5, 7];
$someArrayCount = iterator_count($someArray);

print('Count: ' . $someArrayCount . PHP_EOL);

$someIterator = new ArrayIterator($someArray);
$someIteratorCount = iterator_count($someIterator);

print('Count: ' . $someIteratorCount . PHP_EOL);
