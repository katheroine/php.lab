<?php

$someNothing = null;
$nullToString = (string) $someNothing;
print("null to string: ");
var_dump($nullToString);

print(PHP_EOL);

$someRight = true;
$intToString = (string) $someRight;
print("true to string: ");
var_dump($intToString);

$someWrong = false;
$intToString = (string) $someWrong;
print("false to string: ");
var_dump($intToString);

print(PHP_EOL);

$someNumber = 0;
$intToString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($intToString);

$someNumber = -0;
$intToString = (string) $someNumber;
print("-0 to string: ");
var_dump($intToString);

$someNumber = 1;
$intToString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($intToString);

$someNumber = -1;
$intToString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($intToString);

$someNumber = 3;
$intToString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($intToString);

print(PHP_EOL);

$someMeasure = 0.0;
$floatToString = (string) $someMeasure;
print("0.0 to string: ");
var_dump($floatToString);

$someMeasure = -0.0;
$floatToString = (string) $someMeasure;
print("-0.0 to string: ");
var_dump($floatToString);

$someMeasure = 0.1;
$floatToString = (string) $someMeasure;
print("{$someMeasure} to string: ");
var_dump($floatToString);

$someMeasure = 1.0;
$floatToString = (string) $someMeasure;
print("1.0 to string: ");
var_dump($floatToString);

$someMeasure = 3.0;
$floatToString = (string) $someMeasure;
print("3.0 to string: ");
var_dump($floatToString);

print(PHP_EOL);
