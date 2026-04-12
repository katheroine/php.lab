<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$emptyObject = (array)[];

$objectFromArray = (array)[
    'some_key' => ' value',
    'other key' => 1024,
    10 => 14.2,
];

class SomeClass
{
    public $publicProperty = 5;
    protected $protectedProperty = 15.5;
    private $privateProperty = 'hello';
}
$objectFromClass = new SomeClass();

$emptyObjectToBool = (bool) $emptyObject;
print("Empty object to bool: ");
var_dump($emptyObjectToBool);
$objectFromArrayToBool = (bool) $objectFromArray;
print("Object from array to bool: ");
var_dump($objectFromArrayToBool);
$objectFromClassToBool = (bool) $objectFromClass;
print("Object from class to bool: ");
var_dump($objectFromClassToBool);
print(PHP_EOL);

// $emptyObjectToInt = (int) $emptyObject;
// print("Empty object to int: ");
// var_dump($emptyObjectToInt);
// $objectFromArrayToInt = (int) $objectFromArray;
// print("Object from array to int: ");
// var_dump($objectFromArrayToInt);
// $objectFromClassToInt = (int) $objectFromClass;
// print("Object from class to int: ");
// var_dump($objectFromClassToInt);
// print(PHP_EOL);

// $emptyObjectToFloat = (float) $emptyObject;
// print("Empty object to float: ");
// var_dump($emptyObjectToFloat);
// $objectFromArrayToFloat = (float) $objectFromArray;
// print("Object from array to float: ");
// var_dump($objectFromArrayToFloat);
// $objectFromClassToFloat = (float) $objectFromClass;
// print("Object from class to float: ");
// var_dump($objectFromClassToFloat);
// print(PHP_EOL);

// $emptyObjectString = (string) $emptyObject;
// print("Empty object to string: ");
// var_dump($emptyObjectToString);
// $objectFromArrayToFloat = (string) $objectFromArray;
// print("Object from array to string: ");
// var_dump($objectFromArrayToFloat);
// $objectFromClassToFloat = (string) $objectFromClass;
// print("Object from class to string: ");
// var_dump($objectFromClassToFloat);
// print(PHP_EOL);

$emptyObjectToArray = (array) $emptyObject;
print("Empty object to object: ");
var_dump($emptyObjectToArray);
$objectFromArrayToArray = (array) $objectFromArray;
print("Object from array to object: ");
var_dump($objectFromArrayToArray);
$objectFromClassToArray = (array) $objectFromClass;
print("Object from class to object: ");
var_dump($objectFromClassToArray);
print(PHP_EOL);
