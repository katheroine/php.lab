<?php

// "The LimitIterator class allows iteration over a limited subset of items in an Iterator."
// -- https://www.php.net/manual/en/class.limititerator.php

$someIterator = new LimitIterator(
    new ArrayIterator([
        'rose',
        'tulip',
        'peony',
        'violet',
        'orchid',
        'daisy'
    ]), 2, 3
);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ':' . $someIterator->getPosition() . ']: ' . $someIterator->current() . ' ');
    $innerIterator = $someIterator->getInnerIterator();
    print('[' . $innerIterator->key() . ']:' . $innerIterator->current() . PHP_EOL);
}

print(PHP_EOL);

$someIterator->seek(3);
print('[3]: ' . $someIterator->current() . PHP_EOL);
$someIterator->seek(4);
print('[4]: ' . $someIterator->current() . PHP_EOL);
$someIterator->seek(2);
print('[2]: ' . $someIterator->current() . PHP_EOL);

print(PHP_EOL);
