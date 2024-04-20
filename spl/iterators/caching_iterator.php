<?php

// "This object supports cached iteration over another iterator."
// -- https://www.php.net/manual/en/class.cachingiterator.php

$someIterator = new CachingIterator(
    new ArrayIterator(['rose', 'tulip', 'peony'])
);

function display(ArrayAccess $array) {
    foreach ($array as $key => $value) {
        print("[${key}]: ${value}\n");
    }
}

display($someIterator);

print(PHP_EOL);

display($someIterator);

print(PHP_EOL);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);
