<?php

$someNothing = null;
$nulltoString = (string) $someNothing;
print("null to string: ");
var_dump($nulltoString);

print(PHP_EOL);

$someRight = true;
$inttoString = (string) $someRight;
print("true to string: ");
var_dump($inttoString);

$someWrong = false;
$inttoString = (string) $someWrong;
print("false to string: ");
var_dump($inttoString);

print(PHP_EOL);

$someNumber = 0;
$inttoString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($inttoString);

$someNumber = -0;
$inttoString = (string) $someNumber;
print("-0 to string: ");
var_dump($inttoString);

$someNumber = 1;
$inttoString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($inttoString);

$someNumber = -1;
$inttoString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($inttoString);

$someNumber = 3;
$inttoString = (string) $someNumber;
print("{$someNumber} to string: ");
var_dump($inttoString);

print(PHP_EOL);

$someMeasure = 0.0;
$floattoString = (string) $someMeasure;
print("0.0 to string: ");
var_dump($floattoString);

$someMeasure = -0.0;
$floattoString = (string) $someMeasure;
print("-0.0 to string: ");
var_dump($floattoString);

$someMeasure = 0.1;
$floattoString = (string) $someMeasure;
print("{$someMeasure} to string: ");
var_dump($floattoString);

$someMeasure = 1.0;
$floattoString = (string) $someMeasure;
print("1.0 to string: ");
var_dump($floattoString);

$someMeasure = 3.0;
$floattoString = (string) $someMeasure;
print("3.0 to string: ");
var_dump($floattoString);

print(PHP_EOL);
