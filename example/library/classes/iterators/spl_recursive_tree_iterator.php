<?php

// "Allows iterating over a RecursiveIterator to generate an ASCII graphic tree."
// -- https://www.php.net/manual/en/class.recursivetreeiterator.php

$someIterator = new RecursiveTreeIterator(
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

foreach($someIterator as $key => $value ){
    print('[' . $key . ']:' . $value . PHP_EOL);
}

print(PHP_EOL);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);
