<?php

// "The SplMaxHeap class provides the main functionalities of a heap, keeping the maximum on the top."
// -- https://www.php.net/manual/en/class.splmaxheap.php

$someHeap = new SplMaxHeap();

$someHeap->insert(7);
$someHeap->insert(3);
$someHeap->insert(9);

function display(Iterator $iterable) {
    for ($iterable->rewind(); $iterable->valid(); $iterable->next()) {
        print($iterable->key() . ': ' . $iterable->current() . PHP_EOL);
    }

    print(PHP_EOL);
}

display($someHeap);

$someHeap->insert(7);
$someHeap->insert(3);
$someHeap->insert(9);

print('Is empty? ' . $someHeap->isEmpty() . PHP_EOL);
print('Count: ' . $someHeap->count() . PHP_EOL);
print('Top: ' . $someHeap->top() . PHP_EOL);
print('Is corrupted: ' . $someHeap->isCorrupted() . PHP_EOL);
$someHeap->recoverFromCorruption();

print(PHP_EOL);

$extracted = $someHeap->extract();
print("Extracted:\n");
var_dump($extracted);

print(PHP_EOL);
