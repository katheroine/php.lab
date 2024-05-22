<?php

// "The InfiniteIterator allows one to infinitely iterate over an iterator
// without having to manually rewind the iterator upon reaching its end."
// -- https://www.php.net/manual/en/class.infiniteiterator.php

$someIterator = new InfiniteIterator(
    new ArrayIterator(['rose', 'tulip', 'peony'])
);

for ($someIterator->rewind(), $i = 0; $someIterator->valid() && $i < 10; $someIterator->next(), $i++) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);

$innerIterator = $someIterator->getInnerIterator();

for ($innerIterator->rewind(); $innerIterator->valid(); $innerIterator->next()) {
    print('[' . $innerIterator->key() . ']:' . $innerIterator->current() . PHP_EOL);
}

print(PHP_EOL);
