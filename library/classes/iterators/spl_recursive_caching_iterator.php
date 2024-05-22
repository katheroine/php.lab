<?php

// -- https://www.php.net/manual/en/class.recursivecachingiterator.php

$someIterator = new RecursiveCachingIterator(
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
    ]),
    CachingIterator::CATCH_GET_CHILD
);

function display(RecursiveCachingIterator $iterator) {
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
