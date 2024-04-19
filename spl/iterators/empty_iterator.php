<?php

// "The EmptyIterator class for an empty iterator."
// -- https://www.php.net/manual/en/class.emptyiterator.php

$someIterator = new EmptyIterator();

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);
