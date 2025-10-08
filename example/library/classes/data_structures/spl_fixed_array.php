<?php

// "The SplFixedArray class provides the main functionalities of array.
// The main difference between a SplFixedArray and a normal PHP array
// is that the SplFixedArray must be resized manually and allows only integers within the range as indexes.
// The advantage is that it uses less memory than a standard array."
// -- https://www.php.net/manual/en/class.splfixedarray.php

$someArray = new SplFixedArray(3);

function display(ArrayAccess $array) {
    foreach ($array as $item) {
        print($item . PHP_EOL);
    }

    print(PHP_EOL);
}

$someArray[0] = 'orange';
$someArray[1] = 'lemon';
$someArray[2] = 'grapefruit';
// $someArray[3] = 'apple';

display($someArray);

print('Size: ' . $someArray->getSize() . PHP_EOL);
print('Count: ' . $someArray->count() . PHP_EOL);

print(PHP_EOL);

// for ($someArray->rewind(); $someArray->valid(); $someArray->next()) {
//     print($someArray->key() . ': ' . $someArray->current() . PHP_EOL);
// }

$iterator = $someArray->getIterator();

for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
    print($iterator->key() . ': ' . $iterator->current() . PHP_EOL);
}

print(PHP_EOL);

print('Offest exists [1]? ' . $someArray->offsetExists(1) . PHP_EOL);
print('Offest [1]? ' . $someArray->offsetGet(1) . PHP_EOL);
print(PHP_EOL);
$someArray->offsetSet(1, 'strawberry');
display($someArray);
$someArray->offsetUnset(1);
display($someArray);

$array = $someArray->toArray();
print("As array:\n");
var_dump($array);
print(PHP_EOL);

$array = $someArray->jsonSerialize();
print("As array:\n");
var_dump($array);
print(PHP_EOL);

$otherArray = SplFixedArray::fromArray($array);
print("As fixed array:\n");
var_dump($otherArray);
print(PHP_EOL);

$someArray->setSize(2);

print('Size: ' . $someArray->getSize() . PHP_EOL);
print('Count: ' . $someArray->count() . PHP_EOL);
print(PHP_EOL);
display($someArray);
