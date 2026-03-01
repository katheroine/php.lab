<?php

$someNothing = null;
$nullToObject = (object) $someNothing;
print("null to object: ");
var_dump($nullToObject);

print(PHP_EOL);

$someRight = true;
$intToObject = (object) $someRight;
print("true to object: ");
var_dump($intToObject);

$someWrong = false;
$intToObject = (object) $someWrong;
print("false to object: ");
var_dump($intToObject);

print(PHP_EOL);

$someNumber = 0;
$intToObject = (object) $someNumber;
print("{$someNumber} to object: ");
var_dump($intToObject);

$someNumber = 3;
$intToObject = (object) $someNumber;
print("{$someNumber} to object: ");
var_dump($intToObject);

print(PHP_EOL);

$someMeasure = 3.5;
$floatToObject = (object) $someMeasure;
print("3.0 to object: ");
var_dump($floatToObject);

print(PHP_EOL);

$someText = "";
$stringToObject = (object) $someText;
print("\"{$someText}\" to object: ");
var_dump($stringToObject);

$someText = "hello";
$stringToObject = (object) $someText;
print("\"{$someText}\" to object: ");
var_dump($stringToObject);

print(PHP_EOL);

$someCollection = [];
$arrayToObject = (object) $someCollection;
print("[''] to object: ");
var_dump($arrayToObject);

$someCollection = [null, true, 2];
$arrayToObject = (object) $someCollection;
print("[null, true, 2] to object: ");
var_dump($arrayToObject);

$someCollection = [
    'some_key' => 'some value',
    'other key' => 1024,
    10 => true,
];
$arrayToObject = (object) $someCollection;
print(<<<END
[
    'some_key' => 'some value',
    'other key' => 1024,
    10 => true,
]
END . "\nto object: ");
var_dump($arrayToObject);

print(PHP_EOL);
