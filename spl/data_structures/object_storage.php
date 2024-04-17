<?php

// "The SplObjectStorage class provides a map from objects to data or, by ignoring data, an object set.
// This dual purpose can be useful in many cases involving the need to uniquely identify objects."
// -- www.php.net/manual/en/class.splobjectstorage.php

$someStorage = new SplObjectStorage();

function display(ArrayAccess $array) {
    foreach ($array as $item) {
        var_dump($item);
    }

    print(PHP_EOL);
}

$object = (object) ['grapefruit'];

$someStorage->attach((object) ['orange']);
$someStorage->attach((object) ['lemon']);
$someStorage->attach($object);

display($someStorage);

print('Count: ' . $someStorage->count() . PHP_EOL);
print('Contains object grapefruit? ' . $someStorage->contains($object) . PHP_EOL);

print(PHP_EOL);

$someStorage->detach($object);

display($someStorage);

print('Count: ' . $someStorage->count() . PHP_EOL);
print('Contains object grapefruit? ' . $someStorage->contains($object) . PHP_EOL);

print(PHP_EOL);

for ($someStorage->rewind(); $someStorage->valid(); $someStorage->next()) {
    print('[' . $someStorage->key() . ']:' . PHP_EOL);
    var_dump($someStorage->current());
}

print(PHP_EOL);

$otherStorage = new SplObjectStorage();

$object = (object) ['apple'];
$otherStorage->attach($object);
$otherStorage->attach((object) ['pear']);

$someStorage->addAll($otherStorage);

display($someStorage);

$someStorage->removeAll($otherStorage);

display($someStorage);

$someStorage->addAll($otherStorage);

display($someStorage);

$someStorage->removeAllExcept($otherStorage);

display($someStorage);

print('Hash:' . $someStorage->getHash($object) . PHP_EOL);

print(PHP_EOL);

print('Offest exists [object apple]? ' . $someStorage->offsetExists($object) . PHP_EOL);
print('Offest [object apple]? ' . $someStorage->offsetGet($object) . PHP_EOL);
print(PHP_EOL);
$someStorage->offsetSet($object, 'most popular European fruit');
display($someStorage);
$someStorage->offsetUnset($object);
display($someStorage);

print("Info:\n");
var_dump($someStorage->getInfo());
print(PHP_EOL);
$someStorage->setInfo('Friuts are good.');
print("Info:\n");
var_dump($someStorage->getInfo());
print(PHP_EOL);

$serialized = $someStorage->serialize();
print("Serialized:\n");
var_dump($serialized);
$anotherStorage = new SplObjectStorage(1);
print(PHP_EOL);
$anotherStorage->unserialize($serialized);
print("Unserialized:\n");
var_dump($anotherStorage);
print(PHP_EOL);
