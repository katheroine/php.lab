<?php

// "The SplPriorityQueue class provides the main functionalities of a prioritized queue, implemented using a max heap."
// -- https://www.php.net/manual/en/class.splpriorityqueue.php

$someQueue = new SplPriorityQueue();

function display(Iterator $iterable) {
    for ($iterable->rewind(); $iterable->valid(); $iterable->next()) {
        print($iterable->key() . ': ' . $iterable->current() . PHP_EOL);
    }

    print(PHP_EOL);
}

$someQueue->insert('orange', 3);
$someQueue->insert('lemon', 0);
$someQueue->insert('grapefruit', 1);

display($someQueue);

$someQueue->insert('orange', 3);
$someQueue->insert('lemon', 0);
$someQueue->insert('grapefruit', 1);

print('Is empty? ' . $someQueue->isEmpty() . PHP_EOL);
print('Count: ' . $someQueue->count() . PHP_EOL);
print('Top: ' . $someQueue->top() . PHP_EOL);
print('Is corrupted: ' . $someQueue->isCorrupted() . PHP_EOL);
$someQueue->recoverFromCorruption();

print(PHP_EOL);

print($someQueue->compare('lemon', 'grapefruit') . PHP_EOL);
print($someQueue->compare('lemon', 'orange') . PHP_EOL);

print(PHP_EOL);

display($someQueue);

$someQueue->insert('orange', 3);
$someQueue->insert('lemon', 0);
$someQueue->insert('grapefruit', 1);

print('Extractor flag EXTR_BOTH: ' . SplPriorityQueue::EXTR_BOTH . PHP_EOL);
print('Extractor flag EXTR_PRIORITY: ' . SplPriorityQueue::EXTR_PRIORITY . PHP_EOL);
print('Extractor flag EXTR_DATA: ' . SplPriorityQueue::EXTR_DATA . PHP_EOL);

print(PHP_EOL);

print('Extractor flag: ' . $someQueue->getExtractFlags() . PHP_EOL);

print(PHP_EOL);

$extracted = $someQueue->extract();
print("Extracted:\n");
var_dump($extracted);

$someQueue->setExtractFlags(SplPriorityQueue::EXTR_PRIORITY);
print('Extractor flag: ' . $someQueue->getExtractFlags() . PHP_EOL);

print(PHP_EOL);

$extracted = $someQueue->extract();
print("Extracted:\n");
var_dump($extracted);

print(PHP_EOL);
