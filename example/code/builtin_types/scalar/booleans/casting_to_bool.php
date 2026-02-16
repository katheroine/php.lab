<?php

$someNothing = null;
$nullToBool = (bool) $someNothing;
print("null to bool: ");
var_dump($nullToBool);

print(PHP_EOL);

$someNumber = 0;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

$someNumber = -0;
$intToBool = (bool) $someNumber;
print("-0 to bool: ");
var_dump($intToBool);

$someNumber = 1;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

$someNumber = -1;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

$someNumber = 3;
$intToBool = (bool) $someNumber;
print("{$someNumber} to bool: ");
var_dump($intToBool);

print(PHP_EOL);

$someMeasure = 0.0;
$floatToBool = (bool) $someMeasure;
print("0.0 to bool: ");
var_dump($floatToBool);

$someMeasure = -0.0;
$floatToBool = (bool) $someMeasure;
print("-0.0 to bool: ");
var_dump($floatToBool);

$someMeasure = 0.1;
$floatToBool = (bool) $someMeasure;
print("{$someMeasure} to bool: ");
var_dump($floatToBool);

$someMeasure = 1.0;
$floatToBool = (bool) $someMeasure;
print("1.0 to bool: ");
var_dump($floatToBool);

$someMeasure = 3.0;
$floatToBool = (bool) $someMeasure;
print("3.0 to bool: ");
var_dump($floatToBool);

print(PHP_EOL);

$someText = "";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = " ";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "false";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "true";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "0";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "-0";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "1";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "-1";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "null";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

$someText = "a";
$stringToBool = (bool) $someText;
print("\"{$someText}\" to bool: ");
var_dump($stringToBool);

print(PHP_EOL);

$someCollection = [];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [true];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [false];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [0];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [1];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [''];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

$someCollection = [null];
$arrayToBool = (bool) $someCollection;
print("[] to bool: ");
var_dump($arrayToBool);

print(PHP_EOL);
