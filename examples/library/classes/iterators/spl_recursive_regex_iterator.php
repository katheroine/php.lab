<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "This recursive iterator can filter another recursive iterator via a regular expression."
// -- https://www.php.net/manual/en/class.recursiveregexiterator.php

$someIterator = new RecursiveRegexIterator(
    new RecursiveArrayIterator([
        'foo',
        'bar',
        'faz',
        [
            'baz',
            'bom',
            [
                'dub',
                'dib'
            ]
        ],
        'lol'
    ]),
    '/^(ba|di)/'
);

function display(RecursiveRegexIterator $iterator) {
    for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
        if ($iterator->hasChildren()) {
            display($iterator->getChildren());
        } else {
            print(
                '[' . $iterator->key() . ']: ' . $iterator->current() . PHP_EOL
            );
        }
    }
}

display($someIterator);

print(PHP_EOL);
