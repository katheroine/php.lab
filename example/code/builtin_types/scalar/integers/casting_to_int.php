<?php

$someNothing = null;
$nullToInt = (int) $someNothing;
print("null to int: ");
var_dump($nullToInt);

print(PHP_EOL);

$someRight = true;
$intToInt = (int) $someRight;
print("true to int: ");
var_dump($intToInt);

$someWrong = false;
$intToInt = (int) $someWrong;
print("false to int: ");
var_dump($intToInt);

print(PHP_EOL);

$someMeasure = 0.0;
$floatToInt = (int) $someMeasure;
print("0.0 to int: ");
var_dump($floatToInt);

$someMeasure = 0.1;
$floatToInt = (int) $someMeasure;
print("{$someMeasure} to int: ");
var_dump($floatToInt);

$someMeasure = 0.6;
$floatToInt = (int) $someMeasure;
print("{$someMeasure} to int: ");
var_dump($floatToInt);

$someMeasure = 1.0;
$floatToInt = (int) $someMeasure;
print("1.0 to int: ");
var_dump($floatToInt);

$someMeasure = 3.0;
$floatToInt = (int) $someMeasure;
print("3.0 to int: ");
var_dump($floatToInt);

$someMeasure = -3.0;
$floatToInt = (int) $someMeasure;
print("-3.0 to int: ");
var_dump($floatToInt);

print(PHP_EOL);

$someText = "";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = " ";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "false";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "true";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "0";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "1";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "3";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "-3";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "3.6";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "-3.6";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "null";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "a";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

$someText = "three";
$stringToInt = (int) $someText;
print("\"{$someText}\" to int: ");
var_dump($stringToInt);

print(PHP_EOL);

$someCollection = [];
$arrayToInt = (int) $someCollection;
print("[] to int: ");
var_dump($arrayToInt);

$someCollection = [true];
$arrayToInt = (int) $someCollection;
print("[true] to int: ");
var_dump($arrayToInt);

$someCollection = [false];
$arrayToInt = (int) $someCollection;
print("[false] to int: ");
var_dump($arrayToInt);

$someCollection = [0];
$arrayToInt = (int) $someCollection;
print("[0] to int: ");
var_dump($arrayToInt);

$someCollection = [1];
$arrayToInt = (int) $someCollection;
print("[1] to int: ");
var_dump($arrayToInt);

$someCollection = [''];
$arrayToInt = (int) $someCollection;
print("[''] to int: ");
var_dump($arrayToInt);

$someCollection = [null];
$arrayToInt = (int) $someCollection;
print("[null] to int: ");
var_dump($arrayToInt);

$someCollection = [null, true, 2];
$arrayToInt = (int) $someCollection;
print("[null, true, 2] to int: ");
var_dump($arrayToInt);

$someCollection = [null, true, 2];
$arrayToInt = (int) $someCollection;
print("[1, 2, 3] to int: ");
var_dump($arrayToInt);

print(PHP_EOL);
