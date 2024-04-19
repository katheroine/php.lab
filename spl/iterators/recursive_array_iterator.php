<?php

// "This iterator allows for unsetting and modifying values and keys while iterating over arrays and objects,
// in the same way as the ArrayIterator.
// Additionally, it is possible to iterate over the current iterator entry."
// -- https://www.php.net/manual/en/class.recursivearrayiterator.php

$someIterator = new RecursiveArrayIterator([
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
]);

function display(RecursiveIterator $iterator) {
    for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
        if ($iterator->hasChildren()) {
            display($iterator->getChildren());
        } else {
            print('[' . $iterator->key() . ']: ' . $iterator->current() . PHP_EOL);
        }
    }
}

display($someIterator);

print(PHP_EOL);

print('Count: ' . $someIterator->count() . PHP_EOL);

print(PHP_EOL);

$someIterator->asort();
display($someIterator);
print(PHP_EOL);
$someIterator->ksort();
display($someIterator);
print(PHP_EOL);
