<?php

// "This iterator ignores rewind operations. This allows processing an iterator in multiple partial foreach loops."
// -- https://www.php.net/manual/en/class.norewinditerator.php

$someIterator = new NoRewindIterator(
    new ArrayIterator(['rose', 'tulip', 'peony'])
);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . ' ');
    $innerIterator = $someIterator->getInnerIterator();
    print('[' . $innerIterator->key() . ']:' . $innerIterator->current() . PHP_EOL);
}

print(PHP_EOL);


for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . ' ');
    $innerIterator = $someIterator->getInnerIterator();
    print('[' . $innerIterator->key() . ']:' . $innerIterator->current() . PHP_EOL);
}
