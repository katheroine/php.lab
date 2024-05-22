<?php

// "Allows the removal of elements, and the modification of keys or values while iterating over Arrays or Objects.
// When you want to iterate over the same array multiple times you need to instantiate ArrayObject
// and let it create ArrayIterator instances that refer to it either by using foreach or by calling its getIterator() method manually."
// -- https://www.php.net/manual/en/class.arrayiterator.php

$someIterator = new ArrayIterator(['rose', 'tulip', 'peony']);

function display(ArrayAccess $array) {
    foreach ($array as $key => $value) {
        print("[${key}]: ${value}\n");
    }

    print(PHP_EOL);
}

display($someIterator);

print('Count: ' . $someIterator->count() . PHP_EOL);

print(PHP_EOL);

$someIterator->append('violet');
$someIterator->append('orchid');

display($someIterator);

print('Count: ' . $someIterator->count() . PHP_EOL);

print(PHP_EOL);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);

print('Flag STD_PROP_LIST: ' . ArrayIterator::STD_PROP_LIST . PHP_EOL);
print('Flag ARRAY_AS_PROPS: ' . ArrayIterator::ARRAY_AS_PROPS . PHP_EOL);

print(PHP_EOL);

print("Flags:\n");
var_dump($someIterator->getFlags());
$someIterator->setFlags(ArrayIterator::STD_PROP_LIST);
var_dump($someIterator->getFlags());

print(PHP_EOL);

print('Offest exists [1]? ' . $someIterator->offsetExists(1) . PHP_EOL);
print('Offest [1]? ' . $someIterator->offsetGet(1) . PHP_EOL);
print(PHP_EOL);
$someIterator->offsetSet(1, 'daisy');
display($someIterator);
$someIterator->offsetUnset(1);
display($someIterator);

print(PHP_EOL);

$serialized = $someIterator->serialize();
print("Serialized:\n");
var_dump($serialized);
$otherIterator = new ArrayIterator();
print(PHP_EOL);
$otherIterator->unserialize($serialized);
print("Unserialized:\n");
var_dump($otherIterator);
print(PHP_EOL);

$array = $someIterator->getArrayCopy();
print("As array:\n");
var_dump($array);
print(PHP_EOL);

$someIterator->asort();
display($someIterator);
$someIterator->ksort();
display($someIterator);
$someIterator->natcasesort();
display($someIterator);
$someIterator->natsort();
display($someIterator);
$someIterator->uasort(function($element_1, $element_2) {
    return (strlen((string) $element_1) > strlen((string) $element_2));
});
display($someIterator);
$someIterator->uksort(function($element_1, $element_2) {
    return (strlen((string) $element_1) > strlen((string) $element_2));
});
display($someIterator);

$someIterator->seek(1);
print('[1]: ' . $someIterator->current() . PHP_EOL);
$someIterator->seek(3);
print('[3]: ' . $someIterator->current() . PHP_EOL);
$someIterator->seek(0);
print('[0]: ' . $someIterator->current() . PHP_EOL);
$someIterator->seek(2);
print('[2]: ' . $someIterator->current() . PHP_EOL);

print(PHP_EOL);
