<?php

// "This extended FilterIterator allows a recursive iteration using RecursiveIteratorIterator
// that only shows those elements which have children."
// -- https://www.php.net/manual/en/class.parentiterator.php

$someIterator = new ParentIterator(
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
        'fuschia',
        [
            'lotus'
        ]
    ])
);

foreach($someIterator as $key => $value ){
    print('[' . $key . "]:\n");
    var_dump($value);
    print(PHP_EOL);
}

print(PHP_EOL);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . "]:\n");
    var_dump($someIterator->current());
    print(PHP_EOL);
}

print(PHP_EOL);

function display(ParentIterator $iterator) {
    for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
        print('[' . $iterator->key() . "]:\n");
        var_dump($iterator->current());
        print(PHP_EOL);
        display($iterator->getChildren());

    }
}

display($someIterator);

print(PHP_EOL);
