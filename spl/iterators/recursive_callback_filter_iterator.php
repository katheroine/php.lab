<?php

// -- https://www.php.net/manual/en/class.recursivecallbackfilteriterator.php

$someIterator = new RecursiveCallbackFilterIterator(
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
    function ($current, $key, $iterator) {
        if (in_array($current, ['rose', 'violet', 'daisy'])) {
            return false;
        }

        return true;
    }
);

function display(RecursiveCallbackFilterIterator $iterator) {
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
