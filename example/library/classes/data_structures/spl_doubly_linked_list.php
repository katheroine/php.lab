<?php

// https://www.php.net/manual/en/class.spldoublylinkedlist.php

$someList = new SplDoublyLinkedList();

function display(ArrayAccess $iterable) {
    foreach ($iterable as $item) {
        print($item . PHP_EOL);
    }

    print(PHP_EOL);
}

$someList->push('orange');
$someList->push('lemon');

display($someList);

$someList->unshift('apple');
$someList->unshift('pear');

display($someList);

$someList->pop();

display($someList);

$someList->shift();

display($someList);

$someList->add(1, 'plum');

display($someList);

print('Is empty? ' . $someList->isEmpty() . PHP_EOL);
print('Count: ' . $someList->count() . PHP_EOL);
print('Top: ' . $someList->top() . PHP_EOL);
print('Bottom: ' . $someList->bottom() . PHP_EOL);

print(PHP_EOL);

$someList->rewind();
print($someList->current() . PHP_EOL);
$someList->next();
print($someList->current() . PHP_EOL);
$someList->next();
print($someList->current() . PHP_EOL);
$someList->prev();
print($someList->current() . PHP_EOL);
$someList->prev();
print($someList->current() . PHP_EOL);

print(PHP_EOL);

print('Iterator mode IT_MODE_FIFO: ' . SplDoublyLinkedList::IT_MODE_FIFO . PHP_EOL);
print('Iterator mode IT_MODE_LIFO: ' . SplDoublyLinkedList::IT_MODE_LIFO . PHP_EOL);
print('Iterator mode IT_MODE_KEEP: ' . SplDoublyLinkedList::IT_MODE_KEEP . PHP_EOL);
print('Iterator mode IT_MODE_DELETE: ' . SplDoublyLinkedList::IT_MODE_DELETE . PHP_EOL);

print(PHP_EOL);

print('Iterator mode: ' . $someList->getIteratorMode() . PHP_EOL);

print(PHP_EOL);

for ($someList->rewind(); $someList->valid(); $someList->next()) {
    print($someList->key() . ': ' . $someList->current() . PHP_EOL);
}

print(PHP_EOL);

$someList->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);
print('Iterator mode: ' . $someList->getIteratorMode() . PHP_EOL);

print(PHP_EOL);

for ($someList->rewind(); $someList->valid(); $someList->next()) {
    print($someList->key() . ': ' . $someList->current() . PHP_EOL);
}

print(PHP_EOL);

print('Offest exists [1]? ' . $someList->offsetExists(1) . PHP_EOL);
print('Offest [1]? ' . $someList->offsetGet(1) . PHP_EOL);
print(PHP_EOL);
$someList->offsetSet(1, 'strawberry');
display($someList);
$someList->offsetUnset(1);
display($someList);

$serialized = $someList->serialize();
print("Serialized:\n");
var_dump($serialized);
$otherList = new SplDoublyLinkedList();
print(PHP_EOL);
$otherList->unserialize($serialized);
print("Unserialized:\n");
var_dump($otherList);
print(PHP_EOL);
