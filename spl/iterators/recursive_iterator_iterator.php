<?php

// "Can be used to iterate through recursive iterators."
// -- https://www.php.net/manual/en/class.recursiveiteratoriterator.php

$someIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator([
        'rose',
        'tulip',
        'peony',
        [
            'violet',
            'orchid',
            [
                'daisy',
                'myosote'
            ]
        ],
        'fuschia'
    ])
);

function display(RecursiveIteratorIterator $iterator) {
    for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
        if ($iterator->hasChildren()) {
            display($iterator->getChildren());
        } else {
            print(
                '[' . $iterator->key() . ']: ' . $iterator->current()
                . ' depth: ' . $iterator->getDepth() . PHP_EOL
            );
        }
    }
}

display($someIterator);

print(PHP_EOL);
