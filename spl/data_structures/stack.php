<?php

// "The SplStack class provides the main functionalities of a stack implemented using a doubly linked list
// by setting the iterator mode to SplDoublyLinkedList::IT_MODE_LIFO."
// -- https://www.php.net/manual/en/class.splstack.php

$someStack = new SplStack();

function display(ArrayAccess $iterable) {
    foreach ($iterable as $item) {
        print($item . PHP_EOL);
    }

    print(PHP_EOL);
}

$someStack->push('orange');
$someStack->push('lemon');

display($someStack);

$someStack->unshift('apple');
$someStack->unshift('pear');

display($someStack);

$someStack->pop();

display($someStack);

$someStack->shift();

display($someStack);

$someStack->add(1, 'plum');

display($someStack);

print('Is empty? ' . $someStack->isEmpty() . PHP_EOL);
print('Count: ' . $someStack->count() . PHP_EOL);
print('Top: ' . $someStack->top() . PHP_EOL);
print('Bottom: ' . $someStack->bottom() . PHP_EOL);

print(PHP_EOL);

$someStack->rewind();
print($someStack->current() . PHP_EOL);
$someStack->next();
print($someStack->current() . PHP_EOL);
$someStack->next();
print($someStack->current() . PHP_EOL);
$someStack->prev();
print($someStack->current() . PHP_EOL);
$someStack->prev();
print($someStack->current() . PHP_EOL);

print(PHP_EOL);

print('Iterator mode IT_MODE_FIFO: ' . SplStack::IT_MODE_FIFO . PHP_EOL);
print('Iterator mode IT_MODE_LIFO: ' . SplStack::IT_MODE_LIFO . PHP_EOL);
print('Iterator mode IT_MODE_KEEP: ' . SplStack::IT_MODE_KEEP . PHP_EOL);
print('Iterator mode IT_MODE_DELETE: ' . SplStack::IT_MODE_DELETE . PHP_EOL);

print(PHP_EOL);

print('Iterator mode: ' . $someStack->getIteratorMode() . PHP_EOL);

print(PHP_EOL);

for ($someStack->rewind(); $someStack->valid(); $someStack->next()) {
    print($someStack->key() . ': ' . $someStack->current() . PHP_EOL);
}

print(PHP_EOL);

$someStack->setIteratorMode(SplStack::IT_MODE_LIFO);
print('Iterator mode: ' . $someStack->getIteratorMode() . PHP_EOL);

print(PHP_EOL);

for ($someStack->rewind(); $someStack->valid(); $someStack->next()) {
    print($someStack->key() . ': ' . $someStack->current() . PHP_EOL);
}

print(PHP_EOL);

print('Offest exists [1]? ' . $someStack->offsetExists(1) . PHP_EOL);
print('Offest [1]? ' . $someStack->offsetGet(1) . PHP_EOL);
print(PHP_EOL);
$someStack->offsetSet(1, 'strawberry');
display($someStack);
$someStack->offsetUnset(1);
display($someStack);

$serialized = $someStack->serialize();
print("Serialized:\n");
var_dump($someStack);
$otherStack = new SplStack();
print(PHP_EOL);
$otherStack->unserialize($serialized);
print("Unserialized:\n");
var_dump($someStack);
print(PHP_EOL);
