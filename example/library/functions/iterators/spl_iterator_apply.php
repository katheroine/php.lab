<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Call a function for every element in an iterator"
// -- https://www.php.net/manual/en/function.iterator-apply.php

$someIterator = new ArrayIterator(['orange', 'peach', 'apple']);
$someFunction = function(Iterator $iterator) {
    print($iterator->current() . PHP_EOL);

    return true;
};

iterator_apply($someIterator, $someFunction, array($someIterator));
