<?php

// "This class allows objects to work as arrays."
// -- https://www.php.net/manual/en/class.arrayobject.php

$someArrayObject = new ArrayObject(['rose', 'orange', 'violet']);

function display($collection) {
    foreach ($collection as $key => $value) {
        print("[{$key}]: {$value}\n");
    }
}

display($someArrayObject);
print('Count: ' . $someArrayObject->count() . PHP_EOL);

print(PHP_EOL);

$someArrayObject->append('pencil');
$someArrayObject->append('pen');

display($someArrayObject);
print('Count: ' . $someArrayObject->count() . PHP_EOL);

print(PHP_EOL);

$copy = $someArrayObject->getArrayCopy();

display($copy);

print(PHP_EOL);

$someArrayObject->exchangeArray(['phone', 'book', 'number']);

display($someArrayObject);

print(PHP_EOL);

$iterator = $someArrayObject->getIterator();

for($iterator->rewind(); $iterator->valid(); $iterator->next()) {
    print('[' . $iterator->key() . ']: ' . $iterator->current() . PHP_EOL);
}

print(PHP_EOL);

$someArrayObject->exchangeArray($copy);

$someArrayObject->asort();

display($someArrayObject);

print(PHP_EOL);

print('Offest exists [1]? ' . $someArrayObject->offsetExists(1) . PHP_EOL);
print('Offest [1]? ' . $someArrayObject->offsetGet(1) . PHP_EOL);
print(PHP_EOL);
$someArrayObject->offsetSet(1, 'strawberry');
display($someArrayObject);
print(PHP_EOL);
$someArrayObject->offsetUnset(1);
display($someArrayObject);
print(PHP_EOL);

$serialized = $someArrayObject->serialize();
print("Serialized:\n");
var_dump($serialized);
$otherArrayObject = new ArrayObject();
print(PHP_EOL);
$otherArrayObject->unserialize($serialized);
print("Unserialized:\n");
var_dump($otherArrayObject);
print(PHP_EOL);
