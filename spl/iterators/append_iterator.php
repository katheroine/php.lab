<?php

// "An Iterator that iterates over several iterators one after the other."
// -- https://www.php.net/manual/en/class.appenditerator.php

$someIterator = new AppendIterator();

function display(Iterator $array) {
    foreach ($array as $key => $value) {
        print("[${key}]: ${value}\n");
    }

    print(PHP_EOL);
}

$otherIterator = new ArrayIterator(['rose', 'tulip', 'peony']);
$anotherIterator = new ArrayIterator(['violet', 'orchid']);

$someIterator->append($otherIterator);
$someIterator->append($anotherIterator);

display($someIterator);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ':' . $someIterator->getIteratorIndex() . ']: ' . $someIterator->current() . ' ');
    $innerIterator = $someIterator->getInnerIterator();
    print('[' . $innerIterator->key() . ']:' . $innerIterator->current() . PHP_EOL);
}

print(PHP_EOL);

$innerIterator = $someIterator->getInnerIterator();
print('Iterator type: ' . gettype($innerIterator) . PHP_EOL);

$arrayIterator = $someIterator->getArrayIterator();
print('Iterator class: ' . get_class($arrayIterator) . PHP_EOL);

for ($arrayIterator->rewind(); $arrayIterator->valid(); $arrayIterator->next()) {
    print('[' . $arrayIterator->key() . ']: ' . PHP_EOL);
    var_dump($arrayIterator->current());
    print(PHP_EOL);
}

print(PHP_EOL);
