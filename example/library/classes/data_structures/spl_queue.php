<?php

// "The SplQueue class provides the main functionalities of a queue implemented using a doubly linked list
// by setting the iterator mode to SplDoublyLinkedList::IT_MODE_FIFO."
// -- https://www.php.net/manual/en/class.splqueue.php

$someQueue = new SplQueue();

function display(ArrayAccess $iterable) {
    foreach ($iterable as $item) {
        print($item . PHP_EOL);
    }

    print(PHP_EOL);
}

$someQueue->push('orange');
$someQueue->push('lemon');

display($someQueue);

$someQueue->unshift('apple');
$someQueue->unshift('pear');

display($someQueue);

$someQueue->pop();

display($someQueue);

$someQueue->shift();

display($someQueue);

$someQueue->add(1, 'plum');

display($someQueue);

print('Is empty? ' . $someQueue->isEmpty() . PHP_EOL);
print('Count: ' . $someQueue->count() . PHP_EOL);
print('Top: ' . $someQueue->top() . PHP_EOL);
print('Bottom: ' . $someQueue->bottom() . PHP_EOL);

print(PHP_EOL);

$someQueue->rewind();
print($someQueue->current() . PHP_EOL);
$someQueue->next();
print($someQueue->current() . PHP_EOL);
$someQueue->next();
print($someQueue->current() . PHP_EOL);
$someQueue->prev();
print($someQueue->current() . PHP_EOL);
$someQueue->prev();
print($someQueue->current() . PHP_EOL);

print(PHP_EOL);

print('Iterator mode IT_MODE_FIFO: ' . SplQueue::IT_MODE_FIFO . PHP_EOL);
print('Iterator mode IT_MODE_LIFO: ' . SplQueue::IT_MODE_LIFO . PHP_EOL);
print('Iterator mode IT_MODE_KEEP: ' . SplQueue::IT_MODE_KEEP . PHP_EOL);
print('Iterator mode IT_MODE_DELETE: ' . SplQueue::IT_MODE_DELETE . PHP_EOL);

print(PHP_EOL);

print('Iterator mode: ' . $someQueue->getIteratorMode() . PHP_EOL);

print(PHP_EOL);

for ($someQueue->rewind(); $someQueue->valid(); $someQueue->next()) {
    print($someQueue->key() . ': ' . $someQueue->current() . PHP_EOL);
}

print(PHP_EOL);

print('Offest exists [1]? ' . $someQueue->offsetExists(1) . PHP_EOL);
print('Offest [1]? ' . $someQueue->offsetGet(1) . PHP_EOL);
print(PHP_EOL);
$someQueue->offsetSet(1, 'strawberry');
display($someQueue);
$someQueue->offsetUnset(1);
display($someQueue);

$serialized = $someQueue->serialize();
print("Serialized:\n");
var_dump($serialized);
$otherQueue = new SplQueue();
print(PHP_EOL);
$otherQueue->unserialize($serialized);
print("Unserialized:\n");
var_dump($otherQueue);
print(PHP_EOL);

var_dump($someQueue);
print(PHP_EOL);
print("Dequeued:\n");
// "SplQueue::dequeue() is an alias of SplDoublyLinkedList::shift()."
$dequeued = $someQueue->dequeue();
var_dump($someQueue);
print(PHP_EOL);
var_dump($dequeued);
print(PHP_EOL);
// "SplQueue::enqueue() is an alias of SplDoublyLinkedList::push()."
$someQueue->enqueue('mango');
print("Enqueued:\n");
var_dump($someQueue);
print(PHP_EOL);
