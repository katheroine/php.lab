<?php

// "Call a function for every element in an iterator"
// -- https://www.php.net/manual/en/function.iterator-apply.php

$someIterator = new ArrayIterator(['orange', 'peach', 'apple']);
$someFunction = function(Iterator $iterator) {
    print($iterator->current() . PHP_EOL);

    return true;
};

iterator_apply($someIterator, $someFunction, array($someIterator));
