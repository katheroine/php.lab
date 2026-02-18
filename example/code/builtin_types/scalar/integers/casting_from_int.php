<?php

$zero = 0;
$somePositive = 5;
$someNegative = -5;

$zeroToBool = (bool) $zero;
print("Zero to bool: ");
var_dump($zeroToBool);
$positiveToBool = (bool) $somePositive;
print("Positive to bool: ");
var_dump($positiveToBool);
$negativeToBool = (bool) $someNegative;
print("Negative to bool: ");
var_dump($negativeToBool);
print(PHP_EOL);

$zeroToFloat = (float) $zero;
print("Zero to float: ");
var_dump($zeroToFloat);
$positiveToFloat = (float) $somePositive;
print("Positive to float: ");
var_dump($positiveToFloat);
$negativeToFloat = (float) $someNegative;
print("Negative to float: ");
var_dump($negativeToFloat);
print(PHP_EOL);

$zeroToString = (string) $zero;
print("Zero to string: ");
var_dump($zeroToString);
$positiveToString = (string) $somePositive;
print("Positive to string: ");
var_dump($positiveToString);
$negativeToString = (string) $someNegative;
print("Negative to string: ");
var_dump($negativeToString);
print(PHP_EOL);

$zeroToArray = (array) $zero;
print("Zero to array: ");
var_dump($zeroToArray);
$positiveToArray = (array) $somePositive;
print("Positive to array: ");
var_dump($positiveToArray);
$negativeToArray = (array) $someNegative;
print("Negative to array: ");
var_dump($negativeToArray);
print(PHP_EOL);

$zeroToObject = (object) $zero;
print("Zero to object: ");
var_dump($zeroToObject);
$positiveToObject = (object) $somePositive;
print("Positive to object: ");
var_dump($positiveToObject);
$negativeToObject = (object) $someNegative;
print("Negative to object: ");
var_dump($negativeToObject);
print(PHP_EOL);
