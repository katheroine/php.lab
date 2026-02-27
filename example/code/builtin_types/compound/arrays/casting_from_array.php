<?php

$someEmptyArray = [];
$someIndexedArray = [null, true, 3, 'orange'];
$someAssociativeArray = [
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];

$emptyArrayToBool = (bool) $someEmptyArray;
print("Empty array to bool: ");
var_dump($emptyArrayToBool);
$indexedArrayToBool = (bool) $someIndexedArray;
print("Indexed array to bool: ");
var_dump($indexedArrayToBool);
$associativeArrayToBool = (bool) $someAssociativeArray;
print("Associative array to bool: ");
var_dump($associativeArrayToBool);
print(PHP_EOL);

$emptyArrayToInt = (int) $someEmptyArray;
print("Empty array to int: ");
var_dump($emptyArrayToInt);
$indexedArrayToInt = (int) $someIndexedArray;
print("Indexed array to int: ");
var_dump($indexedArrayToInt);
$associativeArrayToInt = (int) $someAssociativeArray;
print("Associative array to int: ");
var_dump($associativeArrayToInt);
print(PHP_EOL);

$emptyArrayToFloat = (float) $someEmptyArray;
print("Empty array to float: ");
var_dump($emptyArrayToFloat);
$indexedArrayToFloat = (float) $someIndexedArray;
print("Indexed array to float: ");
var_dump($indexedArrayToFloat);
$associativeArrayToFloat = (float) $someAssociativeArray;
print("Associative array to float: ");
var_dump($associativeArrayToFloat);
print(PHP_EOL);

// /$emptyArrayString = (bool) $someEmptyArray;
// print("Empty array to string: ");
// var_dump($emptyArrayToString);
// $indexedArrayToFloat = (string) $someIndexedArray;
// print("Indexed array to string: ");
// var_dump($indexedArrayToFloat);
// $associativeArrayToFloat = (string) $someAssociativeArray;
// print("Associative array to string: ");
// var_dump($associativeArrayToFloat);
// print(PHP_EOL);

$emptyArrayToObject = (bool) $someEmptyArray;
print("Empty array to object: ");
var_dump($emptyArrayToObject);
$indexedArrayToObject = (object) $someIndexedArray;
print("Indexed array to object: ");
var_dump($indexedArrayToObject);
$associativeArrayToObject = (object) $someAssociativeArray;
print("Associative array to object: ");
var_dump($associativeArrayToObject);
print(PHP_EOL);
