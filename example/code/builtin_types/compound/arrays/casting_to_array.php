<?php

use SomeClass as GlobalSomeClass;

$someNothing = null;
$nullToArray = (array) $someNothing;
print("null to array: ");
var_dump($nullToArray);

print(PHP_EOL);

$someRight = true;
$intToArray = (array) $someRight;
print("true to array: ");
var_dump($intToArray);

$someWrong = false;
$intToArray = (array) $someWrong;
print("false to array: ");
var_dump($intToArray);

print(PHP_EOL);

$someNumber = 0;
$intToArray = (array) $someNumber;
print("{$someNumber} to array: ");
var_dump($intToArray);

$someNumber = -1;
$intToArray = (array) $someNumber;
print("{$someNumber} to array: ");
var_dump($intToArray);

$someNumber = 3;
$intToArray = (array) $someNumber;
print("{$someNumber} to array: ");
var_dump($intToArray);

print(PHP_EOL);

$someMeasure = 0.0;
$floatToArray = (array) $someMeasure;
print("0.0 to array: ");
var_dump($floatToArray);

$someMeasure = 1.0;
$floatToArray = (array) $someMeasure;
print("1.0 to array: ");
var_dump($floatToArray);

$someMeasure = 3.0;
$floatToArray = (array) $someMeasure;
print("3.0 to array: ");
var_dump($floatToArray);

print(PHP_EOL);

$someText = "";
$stringToArray = (array) $someText;
print("\"{$someText}\" to array: ");
var_dump($stringToArray);

$someText = "hello";
$stringToArray = (array) $someText;
print("\"{$someText}\" to array: ");
var_dump($stringToArray);

print(PHP_EOL);

$someObject = (object) [];
$objectToArray = (array) $someObject;
print("empty object to array: ");
var_dump($objectToArray);

$someObject = (object) [
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];
$objectToArray = (array) $someObject;
print("object to array: ");
var_dump($objectToArray);

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 15.5;
    private $privateProperty = 'hello';
}
$someObject = new SomeClass();
$objectToArray = (array) $someObject;
print("class object to array: ");
var_dump($objectToArray);
