<?php

// "An Iterator that sequentially iterates over all attached iterators."
// -- https://www.php.net/manual/en/class.multipleiterator.php

$someIterator = new MultipleIterator();

function display(Iterator $array) {
    foreach ($array as $key => $value) {
        print("key:\n");
        var_dump($key);
        print("value:\n");
        var_dump($value);
        print(PHP_EOL);
    }

    print(PHP_EOL);
}

$otherIterator = new ArrayIterator(['rose', 'tulip', 'peony']);
$anotherIterator = new ArrayIterator(['violet', 'orchid']);

$someIterator->attachIterator($otherIterator);
$someIterator->attachIterator($anotherIterator);

display($someIterator);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print("key:\n");
    var_dump($someIterator->key());
    print("value:\n");
    var_dump($someIterator->current());
    print(PHP_EOL);
}

print('Iterators count: ' . $someIterator->countIterators() . PHP_EOL);
print('Contains iterator otherIterator? ' . $someIterator->containsIterator($otherIterator) . PHP_EOL);
print('Contains iterator anotherIterator? ' . $someIterator->containsIterator($anotherIterator) . PHP_EOL);

print(PHP_EOL);

$someIterator->detachIterator($otherIterator);

print('Iterators count: ' . $someIterator->countIterators() . PHP_EOL);
print('Contains iterator otherIterator? ' . $someIterator->containsIterator($otherIterator) . PHP_EOL);
print('Contains iterator anotherIterator? ' . $someIterator->containsIterator($anotherIterator) . PHP_EOL);

print(PHP_EOL);

$someIterator->detachIterator($anotherIterator);

print('Iterators count: ' . $someIterator->countIterators() . PHP_EOL);
print('Contains iterator otherIterator? ' . $someIterator->containsIterator($otherIterator) . PHP_EOL);
print('Contains iterator anotherIterator? ' . $someIterator->containsIterator($anotherIterator) . PHP_EOL);

print(PHP_EOL);
