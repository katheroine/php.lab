<?php

$someRight = true;
$someWrong = false;

$trueToInteger = (int) $someRight;
print("True to integer: ");
var_dump($trueToInteger);
$falseToInteger = (int) $someWrong;
print("False to integer: ");
var_dump($falseToInteger);
print(PHP_EOL);

$trueToFloat = (float) $someRight;
print("True to float: ");
var_dump($trueToFloat);
$falseToFloat = (float) $someWrong;
print("False to float: ");
var_dump($falseToFloat);
print(PHP_EOL);

$trueToString = (string) $someRight;
print("True to string: ");
var_dump($trueToString);
$falseToString = (string) $someWrong;
print("False to string: ");
var_dump($falseToString);
print(PHP_EOL);

$trueToArray = (array) $someRight;
print("True to array: ");
var_dump($trueToArray);
$falseToArray = (array) $someWrong;
print("False to string: ");
var_dump($falseToArray);
print(PHP_EOL);

$trueToObject = (object) $someRight;
print("True to object: ");
var_dump($trueToObject);
$falseToObject = (object) $someWrong;
print("False to object: ");
var_dump($falseToObject);
print(PHP_EOL);
