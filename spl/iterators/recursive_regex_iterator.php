<?php

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
